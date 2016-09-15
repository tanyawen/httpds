<?php
/**
 * Created by PhpStorm.
 * User: tankal
 * Date: 16/9/11
 * Time: 上午1:15
 */
namespace lib;

class Loader {
    public static function autoload($class) {
        $class = str_replace('\\', '/', $class);
        $file = BATH_PATH.'/'.$class.'.php';
        if (is_file($file)) {
            require_once $file;
        }
    }
}