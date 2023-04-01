<?php


namespace App\Filters;


use Closure;

class FilterDot implements MyFilter
{

    public static function handler($request, Closure $closure)
    {
        $closure($request);
        echo "执行后置中间件一", PHP_EOL;
        array_push($request, 'handle by dot filter');

    }
}
