<?php

namespace App\Models;

use App\Http\Traits\Dog;

class Cat
{
    use Dog;
    public function say() {
        echo "this is a cat say";
    }
    public function dance() {
        echo "this is a cat dance";
    }
}
