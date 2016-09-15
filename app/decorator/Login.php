<?php
/**
 * Created by PhpStorm.
 * User: tankal
 * Date: 16/9/13
 * Time: 上午11:47
 */

namespace app\decorator;


class Login implements IDecorator
{

    public function beforeRequest($e = ''){
        session_start();
        if (empty($_SESSION['isLogin'])) {
            header('Location:/login/index');
            exit;
        }
    }
    public function afterRequest($e = ''){
        return false;
    }
}