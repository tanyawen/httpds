<?php
/**
 * Created by PhpStorm.
 * User: tankal
 * Date: 16/9/13
 * Time: 上午11:39
 */

namespace app\decorator;


Interface IDecorator
{
    public function beforeRequest($e = '');
    public function afterRequest($e = '');

}