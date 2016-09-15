<?php
namespace app\decorator;
/**
 * Created by PhpStorm.
 * User: tankal
 * Date: 16/9/13
 * Time: 上午11:34
 */
class Json implements IDecorator
{
    public function beforeRequest($e = ''){
        return false;
    }
    public function afterRequest($e = ''){
        if($_GET['app'] == 'json') {
            echo json_encode($e,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        }
    }

}