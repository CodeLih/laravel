<?php


namespace App\Http\Controllers;

use App\Exceptions\TestException;
use App\Models\User;
use RuntimeException;
use OutOfBoundsException;
use Illuminate\Http\Request;


class TestController extends Controller
{
    protected $array = [];
    public function index(Request $request)
    {
//        $user = User::query()->where('id',1000)->first();
//        if ($user) {
//            return 111;
//        }
//
//        return  222;
       $array[] = "张三";
       $array[] = "李四";
       $array[] = "王五";
       dump($array);

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




