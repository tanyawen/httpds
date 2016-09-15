<?php
/**
 * Created by PhpStorm.
 * User: tankal
 * Date: 16/9/12
 * Time: 下午5:20
 */

namespace vendor\common;


use Symfony\Component\VarDumper\Cloner\Data;

class Log
{
    /**
     * LOG LEVEL define
     */
    const LEVEL_EMERGENCY = 0;
    const LEVEL_ALERT     = 1;
    const LEVEL_CRITICAL  = 2;
    const LEVEL_ERROR     = 3;
    const LEVEL_WARNING   = 4;
    const LEVEL_NOTICE    = 5;
    const LEVEL_INFO      = 6;
    const LEVEL_DEBUG     = 7;

    private static $_errorString = array(
        'EMERGENCY',
        'ALERT',
        'CRITICAL',
        'ERROR',
        'WARNING',
        'NOTICE',
        'INFO',
        'DEBUG'
    );

    private static $_logLevel = self::LEVEL_ERROR;
    private static $_sapiType = null;
    private static $_pid = -1;

    public static function setLogLevel($level) {
        self::$_logLevel = $level;
    }

    /**
     * @param $level
     * @param $message
     */
    private static function _log($level, $message) {
        if (self::$_logLevel >= $level) {
            if (self::$_sapiType === null) {
                self::$_sapiType = php_sapi_name();
            }
            $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
            if (self::$_pid < 0) {
                self::$_pid = posix_getegid();
            }
            if (self::$_sapiType === 'cli') {
                error_log(date('[Y-m-d H:i:s] ').self::$_errorString[$level].' - pid: '.self::$pid.", file: {$backtrace[1]['file']}, line: {$backtrace[1]['line']}, $message");
            } else {
                error_log('pid: '.self::$pid.", file: {$backtrace[1]['file']}, line: {$backtrace[1]['line']}, $message");
            }
        }

    }

    /**
     * @param $message
     */
    public static function emergency($message) {
        self::_log(self::LEVEL_EMERGENCY, $message);
    }

    /**
     * @param $message
     */
    public static function alert($message) {
        self::_log(self::LEVEL_ALERT, $message);
    }

    /**
     * @param $message
     */
    public static function critical($message) {
        self::_log(self::LEVEL_CRITICAL, $message);
    }

    /**
     * @param $message
     */
    public static function error($message) {
        self::_log(self::LEVEL_ERROR, $message);
    }

    /**
     * @param $message
     */
    public static function warning($message) {
        self::_log(self::LEVEL_WARNING, $message);
    }

    /**
     * @param $message
     */
    public static function notice($message) {
        self::_log(self::LEVEL_NOTICE, $message);
    }

    /**
     * @param $message
     */
    public static function info($message) {
        self::_log(self::LEVEL_INFO, $message);
    }

    /**
     * @param $message
     */
    public static function debug($message) {
        self::_log(self::LEVEL_DEBUG, $message);
    }

}