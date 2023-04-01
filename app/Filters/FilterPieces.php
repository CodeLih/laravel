<?php


namespace App\Filters;


use Closure;

class FilterPieces implements MyFilter
{

    public static function handler($request, Closure $closure)
    {
        echo "执行前置中间件二", PHP_EOL;
        array_push($request, 'hanle by pieces filter');
        return $closure($request);
    }
}
