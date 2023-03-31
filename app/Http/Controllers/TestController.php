<?php


namespace App\Http\Controllers;

use App\Events\OrderShipped;
use App\Events\TestEvent;
use App\Exceptions\TestException;
use App\Http\Traits\Dog;
use App\Jobs\TestProd;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use RuntimeException;
use OutOfBoundsException;
use Illuminate\Http\Request;


class TestController extends Controller
{
    use Dog;
    protected $array = [];

    public function index(Request $request)
    {
//        $user = User::query()->where('id',1000)->first();
//        if ($user) {
//            return 111;
//        }
//
//        return  222;
//        dd(123);
//       $array[] = "张三";
//       $array[] = "李四";
//       $array[] = "王五";
//       dump($array);
//         echo 111;
//        $user = Auth::user();
//        echo '111111'.$user;
//       dd($user->email);
//        app('redis')->hset('1111', '2222', '3333');
//        Redis::set('111', '2222');
//        $instance = new \ReflectionClass(User::class);
//        $instance->newInstanceArgs([]);
//        dd($instance);
    }

    /**
     * @param Request $request
     * @throws TestException
     */
    public function test(Request $request) {
        $key = $request->input("key");
        echo $key;
        if ($key == 1) {
            throw  new RuntimeException("运行时异常");
        }
        if ($key == 2) {
            throw new OutOfBoundsException("越界异常");
        }
        if ($key == 3) {
            throw new TestException("testException");
        }
    }

}




