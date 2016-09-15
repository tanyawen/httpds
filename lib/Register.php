<?php
/**
 * Created by PhpStorm.
 * User: tankal
 * Date: 16/9/11
 * Time: 上午10:25
 */
namespace lib;

class Register {
    static protected $_registerTree = [];
    public static function set($alias, $object) {
        static::$_registerTree[$alias] = $object;
    }

    public static function get($name) {
        if (isset(static::$_registerTree[$name])) {
            return static::$_registerTree[$name];
        }
        return false;
    }

    public static function _unset($name) {
        unset(static::$_registerTree[$name]);
    }


}