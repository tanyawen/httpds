<?php
/**
 * Created by PhpStorm.
 * User: tankal
 * Date: 16/9/13
 * Time: 上午11:50
 */

namespace app\home\controller;


class Login
{
    public function index() {
        echo 'please login';
        session_start();
        $_SESSION['isLogin'] = 1;
        exit;
    }
}