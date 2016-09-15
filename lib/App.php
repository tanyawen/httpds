<?php
/**
 * Created by PhpStorm.
 * User: tankal
 * Date: 16/9/12
 * Time: 下午10:27
 */

namespace lib;


class App
{
    private static $_instance;
    public  $config;
    protected $_baseDir;
    protected function __construct($dir = '')
    {
        $this->_baseDir = $dir;
        $this->config = new Config($dir.'/vendor/configs');
    }

    public static function getInstance($dir = '') {
        if (empty(static::$_instance)) {
            static::$_instance = new self($dir);
        }
        return static::$_instance;
    }
    public function request() {
        $uri = $_SERVER['REQUEST_URI'];
        if ($uri !== '/') {
            $arr = explode('/', trim($uri,'/'));
            $c = array_shift($arr);
            if ($c === 'admin') {
                $adminFlag = true;
                $c = isset($arr[0]) ? array_shift($arr) :'index';
            } else {
                $adminFlag = false;
            }
            if (isset($arr[0])) {
                $v = array_shift($arr);
            } else {
                $v = 'index';
            }
            //处理get 参数
            $count = count($arr);
            $i = 0;
            while ($i< $count) {
                if (isset($arr[$i+1])) {
                    $_GET[$arr[$i]] = $arr[$i+1];
                }
                $i += 2;
            }
        } else {
            $adminFlag = false;
            $c = 'index';
            $v = 'index';
        }
        $isAdmin = $adminFlag?'admin' :'home';
        $c_lower = $c;
        $c = ucwords($c);
        $class = '\\app\\'.$isAdmin.'\\controller\\'.$c;
        $obj = new $class;
        $return = $obj->$v();
        return $return;

    }
}