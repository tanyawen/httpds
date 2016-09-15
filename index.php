<?php
define('BATH_PATH', __DIR__);
define('DEBUG' ,1);
require_once BATH_PATH.'/Lib/Loader.php';
if (DEBUG) {
    ini_set('display_error', 1);
    error_reporting(E_ALL);
}
//注册自动加载类
spl_autoload_register(['\Lib\Loader', 'autoload']);

//$res = \lib\App::getInstance(__DIR__)->request();
$res = \lib\Factory::getDbInstance();
print_r($res->getMysqli());
//print_r($res);

