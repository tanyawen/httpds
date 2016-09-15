<?php
/**
 * Created by PhpStorm.
 * User: tankal
 * Date: 16/9/11
 * Time: 上午1:12
 */
namespace app\home\controller;

class Index {
    public function index() {
        print_r($_GET);
    }
    public static function test() {
        echo __METHOD__;
    }
}
