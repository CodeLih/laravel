<?php


namespace App\Http\Controllers;


use Firebase\JWT\JWT;
use GuzzleHttp\Client;

class TestTokenController
{
	public function index()
	{
//		$key = "admin";
//		$token = [
//			'iss' => '', //签发者可以为空
//			'aud' => '', //面向的用户，可以为空
//			'iat' => time(), //签发时间
//			'nef' => time() + 60, //生效时间
//			'exp' => time() + 7200 ,//过期时间
//			'uid' => 123, //用户id，有用户其他信息也可以添加
//		];
//		$jwt = JWT::encode($token, $key, 'HS256');
//		return $jwt;
//        echo 111;die;
//        $client = new Client();
//        $result = $client->request('POST','http://www.laravels.com/test',[
//            'multipart' => [
//                [
//                    'Content-type' => 'multipart/form-data',
//                    'name' => 'image_file',
//                    'contents' => fopen('/Users/Lee/Desktop/111.pdf', 'r')
//                ]
//            ]
//        ]);
//        dd($result->getBody());
//        $url = "https://mp.weixin.qq.com/bizmall/authinvoice?action=list&s_pappid=d3g3YzRhYzBhYWRkNTYzMGFlX5WNp0lg9Bn2CDM5k00LTN38iEt_4G9i79RVxGIT89RG";
//        echo 6666;
//        echo $result = substr($url,strripos($url,"-")+1);

	}
	public function parseToken() {
		$key = "ker4H1Gp4TsddddWJMac2SMA8Zsh3drv";
		$jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjFcL2FwaVwvaDVhcHBcL3d4YXBwXC9uZXdfbG9naW4iLCJpYXQiOjE2ODAxMTU2NzUsImV4cCI6MTY4MDU0NzY3NSwibmJmIjoxNjgwMTE1Njc1LCJqdGkiOiJVeDE4MlJ5OXFYSDlKWGx1Iiwic3ViIjoiNDI5OF9lc3BpZXJfb0I2Rkc1SE44Uy1UUk53MXRndlhCcko4QXdMb19lc3BpZXJfb0I2Rkc1SE44Uy1UUk53MXRndlhCcko4QXdMbyIsInBydiI6IjkxNWVmM2IxNDU3OTdkOTYzNmU2Njc4NjYwODljNmJiMWZlMzJlMWMiLCJpZCI6IjQyOThfZXNwaWVyX29CNkZHNUhOOFMtVFJOdzF0Z3ZYQnJKOEF3TG9fZXNwaWVyX29CNkZHNUhOOFMtVFJOdzF0Z3ZYQnJKOEF3TG8iLCJ1c2VyX2lkIjoiNDI5OCIsImNvbXBhbnlfaWQiOiIxIiwidW5pb25pZCI6Im9CNkZHNUhOOFMtVFJOdzF0Z3ZYQnJKOEF3TG8iLCJvcGVuaWQiOiJvQjZGRzVITjhTLVRSTncxdGd2WEJySjhBd0xvIiwib3BlcmF0b3JfdHlwZSI6InVzZXIifQ.DN_5QQx5u-PMzo2G5130OT6wkBEOruvB_tYRDyWlryg';
		//return  JWT::decode($jwt,$key,['HS256']);
        return $this->verifyToken($jwt);

	}

    public function verifyToken(string $Token)
    {
        $key = 'ker4H1Gp4TsddddWJMac2SMA8Zsh3drv';
        $tokens = explode('.', $Token);
        if (count($tokens) != 3) {
            return false;
        }
        echo 111;
        list($base64header, $base64payload, $sign) = $tokens;
        echo $sign . "---";

        //获取jwt算法
        $base64decodeheader = json_decode($this->base64UrlDecode($base64header), JSON_OBJECT_AS_ARRAY);
        echo '+++'.$this->signature($base64header . '.' . $base64payload, $key, 'HS256');
        echo '==='.$base64decodeheader['alg'];
        if (empty($base64decodeheader['alg'])) {
            return false;
        }

        //签名验证
        if ($this->signature($base64header . '.' . $base64payload, $key, 'HS256') !== $sign) {
            dump($this->signature($base64header . '.' . $base64payload, $key, 'HS256'), $sign);
            echo  333;
            return false;
        }
        $payload = json_decode($this->base64UrlDecode($base64payload), JSON_OBJECT_AS_ARRAY);

        //签发时间大于当前服务器时间验证失败
        if (isset($payload['iat']) && $payload['iat'] > time()) {
            echo 444;
            return false;
        }

        //过期时间小宇当前服务器时间验证失败
        if (isset($payload['exp']) && $payload['exp'] < time()) {
            echo 555;
            return false;
        }

        //该nbf时间之前不接收处理该Token
        if (isset($payload['nbf']) && $payload['nbf'] > time()) {
            echo 66;
            return false;
        }

        echo 777;
        return $payload;
    }

    /**
     * base64UrlEncode  https://jwt.io/ 中base64UrlEncode编码实现
     * @param string $input 需要编码的字符串
     * @return string
     */
    public function base64UrlEncode(string $input)
    {
        return str_replace('=', '', strtr(base64_encode($input), '+/', '-_'));
    }

    /**
     * base64UrlEncode https://jwt.io/ 中base64UrlEncode解码实现
     * @param string $input 需要解码的字符串
     * @return bool|string
     */
    public function base64UrlDecode(string $input)
    {
        $remainder = strlen($input) % 4;
        if ($remainder) {
            $addlen = 4 - $remainder;
            $input .= str_repeat('=', $addlen);
        }
        return base64_decode(strtr($input, '-_', '+/'));
    }

    /**
     * HMACSHA256签名  https://jwt.io/ 中HMACSHA256签名实现
     * @param string $input 为base64UrlEncode(header).".".base64UrlEncode(payload)
     * @param string $key
     * @param string $alg 算法方式
     * @return mixed
     */
    public function signature(string $input, string $key, $alg = "HS256")
    {
        $alg_config = [
            'HS256' => 'sha256'
        ];
        return $this->base64UrlEncode(hash_hmac($alg_config[$alg], $input, $key, true));
    }

}
