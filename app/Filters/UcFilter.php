<?php


namespace App\Filters;

use Closure;

class UcFilter implements MyFilter
{

    public static function handler($request, Closure $closure)
    {
        echo '执行ucFilter';
        $string = ucfirst($request.' uc');
         return $closure($string);

    }
}
