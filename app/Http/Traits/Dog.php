<?php

namespace App\Http\Traits;

trait Dog
{
    public function eat() {
        dd(111);
        echo "this is a dog eat";
    }
    public function say() {
        echo "this is a dog say";
    }
   public function test() {
       static::$dispatcher->dispatch(

       );
   }
}
