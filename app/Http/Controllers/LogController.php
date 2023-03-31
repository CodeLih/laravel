<?php


namespace App\Http\Controllers;


use App\Contracts\LogInterface;

class LogController extends Controller
{
    public function index(LogInterface $logger)
    {
        $logger->log("输出内容到文件");
    }

}
