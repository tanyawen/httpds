<?php
/**
 * Created by PhpStorm.
 * User: tankal
 * Date: 16/9/12
 * Time: 下午5:58
 */

namespace vendor\common;


class ErrorNo{

    /**
     * @vars 200-299 成功
     */
    const OK = 200; //成功

    /**
     * @vars 400-499 客户端错误
     */
    const REQ_AUTH_REQUIRED    = 401; //未授权
    const REQ_FORBIDDEN        = 403; //禁止访问
    const REQ_NOT_FOUND        = 404; //类名或函数未找到
    const REQ_INVALID_ARGUMENT = 451; //请求中参数不对

    /**
     * @vars 500-599 服务器端错误
     */
    const SVR_INTERNAL        = 500; //内部错误
    const SVR_MYSQL           = 551; //mysql错误
    const SVR_INVALID_CONFIG  = 552; //服务器配置错误
    const SVR_INVALID_SERVICE = 553; //服务名错误

    /**
     * @vars 10000-10999 应用的通用错误
     */
    const APP_OPERATION_NOT_ALLOWED = 10000; //操作无法进行

}