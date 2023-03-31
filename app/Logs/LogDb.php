<?php


namespace App\Logs;


use App\Contracts\LogInterface;

class LogDb implements LogInterface
{

    public function log($content)
    {
        echo $content;
    }
}
