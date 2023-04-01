<?php


namespace App\Filters;


use Closure;

class FilterScum implements MyFilter
{

    public static function handler($request, Closure $next)
    {
        echo "执行前置中间件一",PHP_EOL;
        array_push($request, 'handle by scm filter');
        return $next($request);
    }
}
