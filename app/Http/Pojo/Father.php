<?php

namespace App\Http\Pojo;

use phpDocumentor\Reflection\Types\Self_;

class Father
{
    private static $instance;
    private function __construct() {

    }
    private function __clone() {

    }
    public static function getInstance() {
        if(!self::$instance instanceof Self) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function say() {
        echo "我是一个单例";
    }

}
