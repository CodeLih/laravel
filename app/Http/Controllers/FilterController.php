<?php


namespace App\Http\Controllers;


use App\Filters\FilterDot;
use App\Filters\FilterPieces;
use App\Filters\FilterScum;
use App\Filters\UcFilter;
use App\Filters\UcWordsFilter;

class FilterController
{
   public function index()
   {
       $mainLogic = function($request) {
        echo 'from main logic', PHP_EOL;
        array_push($request, 'through main logic');
        echo 'main logic processed';
        return $request;
       };

        $filters = [
            FilterScum::class,
            FilterPieces::class,
            FilterDot::class
        ];

        $filters = array_reverse($filters);

        $callableOnion = array_reduce($filters, function ($destination, $filter) {
        return function($request) use ($destination, $filter) {

            return $filter::handler($request, $destination);
        };
        }, $mainLogic);
    //    dd($callableOnion);
       call_user_func($callableOnion, ['got no filter yet']);
   }


   public function parseStr()
   {
       $filters = [
           UcFilter::class,
           UcWordsFilter::class
       ];
       $stringWords = app(\Illuminate\Pipeline\Pipeline::class)
           ->via('handler')
           ->send('do some thing')
           ->through($filters)
           ->thenReturn();
        dump($stringWords);
   }

}
