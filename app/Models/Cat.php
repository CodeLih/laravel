<?php

namespace App\Models;

use App\Http\Traits\Dog;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use Dog;
    public function say() {
        echo "this is a cat say";
    }
    public function dance() {
        echo "this is a cat dance";
    }
}
