<?php


namespace App\Http\Controllers;


use App\Events\OrderShipped;
use App\Http\Common\RedisKey;
use App\Http\Pojo\Father;
use App\Http\Utils\CryptAES;
use App\Job\OrderJob;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use ReflectionClass;

class TestController extends Controller
{
    public function index(Request $request)
    {
    
//		Redis::set('name', '聂风');
//		echo Redis::get('name');
//		$redis = Redis::connection();
//		$redis->set("age",25);
//		Redis::select(2);
//		Redis::set('addr', "ssss");
//		$reflction = new ReflectionClass(RedisKey::class);
//		echo $reflction->getConstant('STORE_QR_CODE');
//		event(new OrderShipped());
//		OrderShipped::dispatch();
//		$arr = [
//			'id' => [2,3,6,[0,9]],
//			'name' => ['张三', '李四']
//		];
//		$result = [];
//		array_walk_recursive($arr, function ($value, $key) use (&$result) {
//			if (!is_numeric($key)) {
//				$value = $key . '_' . $value;
//			}
//			array_push($result, $value);
//		});
//
//		$ext = '';
//		$ext .= implode(':' , $result );
//		echo $ext;
        
        //	echo 111;
        //  $this->dispatch(new OrderJob());
//        OrderJob::dispatch()
//            ->delay(now()->addMinutes(1));

//        $cat = new Cat();
//        $cat->eat();
//        $cat->say();
//        $cat->dance();

//        Father::getInstance()->say();
        
//        $arr = [
//            "normal_sign" => '',
//            "not_enough_points" => '',
//            "consume_points_exchange" => '',
//            "make_sign_apply" => '',
//            "point_out" => ''
//        ];
//        $str = '';
//        if (empty($str)) {
//            echo '空';
//        } else {
//            echo '非空';
//        }
  $str = "eDt6Bl2+bIQlLDuavrtvW44747FAKSoTOooSJ7LDsnvaDJ1q23B8cg5qEcxHmJLbgo+whEv8hJFZICRbxb9NkOFZoRyuS6TguS7KDZL6QWgSNz4yqg65XylZRnUGsTvIIbIXOzZQgwgLDtT8UtgyCDGPkdItzTTJ7+8JTEhdOwFjo2xGNifz1wQOq5wh63p9RBnUyDYQU6aouu5qMrbPiJAE8yIxih3Q5pFSJLR8KH3Gul2DOzEu07jL1iWSGeohzgiq/lHxMUNVoBSVgymMUKw3R6E7Cd2iiuXfrmcW8IHvxekK7T2CnE6pNa4gAuQ3
";
        $key = '1234567812345678';
       $res = (new CryptAES($key))->decrypt($str);
        dd($res);
        
     }
   
}




