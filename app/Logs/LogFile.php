<?php


namespace App\Logs;


use App\Contracts\LogInterface;

class LogFile implements LogInterface
{

    public function log($content)
    {
        echo $content;
    }
}
