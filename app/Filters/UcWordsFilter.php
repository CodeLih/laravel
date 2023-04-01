<?php


namespace App\Filters;


use Closure;

class UcWordsFilter implements MyFilter
{

    public static function handler($request, Closure $closure)
    {
        echo '执行UcWordsFilter';
        $string = ucwords($request);
        return $closure($string);
    }
}
