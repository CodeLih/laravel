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
		$key = "admin";
		$jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiIiLCJhdWQiOiIiLCJpYXQiOjE2NTM0NzIzODMsIm5lZiI6MTY1MzQ3MjQ0MywiZXhwIjoxNjUzNDc5NTgzLCJ1aWQiOjEyM30.T_UnxiUlhNv1caM6tZzEjA6VdkDpciFB72eVxj52uJ4';
		return  JWT::decode($jwt,$key,['HS256']);

	}

}