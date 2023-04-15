<?php


namespace App\Http\Controllers;

use App\Commands\Dialog;
use App\Events\OrderShipped;
use App\Events\TestEvent;
use App\Exceptions\TestException;
use App\Http\Traits\Dog;
use App\Jobs\TestProd;
use App\Models\User;
use Iidestiny\LaravelFilesystemOss\OssStorageServiceProvider;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Contracts\Events\Dispatcher as EventDispatcher;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Support\Facades\Validator;
use RuntimeException;
use OutOfBoundsException;
use Illuminate\Http\Request;


class TestController extends Controller
{
    use Dog;
    protected $array = [];
    protected $event;
    protected $validation;
    protected $dispatcher;

    public function __construct(Dispatcher $event, Factory $validation, EventDispatcher $dispatcher)
    {
        $this->event  =$event;
        $this->validation = $validation;
        $this->dispatcher = $dispatcher;
    }

    public function index(Request $request, Validator $validator)
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

//        $arr = [
//            'zhangsn',
//            'lisi'
//        ];
//        $arr = implode(',' , $arr);
//        dump($arr);

//        echo 1111;
//
//        $data['system_type'] = $request->input('system_type');
//        try {
//
//            Validator::make($data, [
//                'system_type' => 'required|in:1,2'
//            ])->validate();
//            $this->validation->make($data,[
//                'system_type' => 'required|in:1,2'
//            ]);
//        }catch (\Exception $e) {
//            dd($e->getMessage());
//        }
//        return "success";
//        $res = $this->event->dispatch(new Dialog());
//        $this->dispatcher->dispatch(new TestEvent());
//        $this->dispatch(new TestProd());
         $arr = [
             [
                 'threadId' => 1,
                 'psotId' => 2
                 ],
             [
                 'threadId' => 1,
                 'psotId' => 2
             ],
             [
                 'threadId' => 2,
                 'psotId' => 2
             ],
         ];
         $sss  = [

           1=>  [
                 'id' => 1,
                 'con' => 2
             ],
          1=>   [
                 'id' => 1,
                 'con' => 2
             ],
          2=> [
              'id' => 2,
              'ss' => 3
          ]
         ];
            $as = [
                'red',
                'red',
                'blue'
            ];
            $str = 'https://mmg-cos-1316680013.cos.ap-chengdu.myqcloud.com/https://man-man-guang-oss.oss-cn-chengdu.aliyuncs.com/default_project/image/1/2023/03/04/d9be185072b871e55d92efeff52134f9m1CMAZ8VyDF8RCFvbEUUrqYjkHoIJeAK-1080x782';
            $pattern = '/^([^s]*)man-man-guang-oss.oss-cn-chengdu/';
            $replacement = '${2}1,$3';

                $str = "https://cdn.app.mmgbuy.cn/default_project/image/1/2023/03/30/";
        dd(substr($str,strripos($str,"default_project")));



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




