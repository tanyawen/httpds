<?php
/**
 * Created by PhpStorm.
 * User: tankal
 * Date: 16/9/11
 * Time: 上午10:24
 */
namespace lib;


class Factory {
    public static function getDbInstance($readOnly = true) {
        $key = 'database'.($readOnly?'_0':'_1');
        $db = Register::get($key);
        if (!$db) {
            $app = App::getInstance(BATH_PATH);
            if ($readOnly) {//主
                $db_conf = $app->config['database']['master'];
            } else {
                $slaves = $app->config['database']['slave'];
                $db_conf = $slaves[array_rand($slaves)];
            }
            $db = new \vendor\common\DB($db_conf);
            //$db = new \mysqli($db_conf['host'], $db_conf['username'], $db_conf['password'],$db_conf['dbName'], $db_conf['port']);
            Register::set($key, $db);
        }
        return $db;

    }
}