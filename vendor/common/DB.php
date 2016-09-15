<?php
namespace vendor\common;
/**
 * Created by PhpStorm.
 * User: tankal
 * Date: 16/9/13
 * Time: 下午3:21
 */
class DB extends \vendor\common\DBConnection {
    private  $_mysqli;
    public function __construct($config)
    {
        $this->_mysqli = $this->createConnection($config);
    }
    public function getMysqli() {
       return $this->_mysqli;
    }
}