<?php
namespace App\Filters;
use Closure;

interface MyFilter
{
    public static function handler($request, Closure $closure);

}
