<?php
/**
 * Created by PhpStorm.
 * User: tankal
 * Date: 16/9/12
 * Time: 下午6:05
 */

namespace vendor\common;


class DBConnection
{
    const MAX_IDLE_TIME = 7200;
    const KEY_NAME_MYSQLI = 'mysqli';
    const KEY_NAME_HOST = 'host';


    protected  function createConnection($config) {
        try {
            $mysqli = new \mysqli($config['host'], $config['username'],
                $config['password'], $config['dbName'], intval($config['port']));
        } catch (\mysqli_sql_exception $e) {
            Log::error("connect to mysql server {$config['host']}:{$config['port']} fail, "
                . 'error info: ' . $e->getMessage());
            throw $e;
        }

        if ($mysqli->connect_error) {
            $message = "connect to mysql server {$config['host']}:{$config['port']} fail, "
                . 'error info: ' . $mysqli->connect_error;
            throw new \Exception($message, ErrorNo::SVR_MYSQL);
        }
        $mysqli->set_charset('UTF8');
        return $mysqli;
    }
}