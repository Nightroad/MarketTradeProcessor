<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 31.07.17
 * Time: 22:18
 */

class Debugger
{
    private static $errorLevel;

    public static function setDebugLevel($level)
    {
        if ($level)
        {
            ini_set('display_errors', 'On');
            error_reporting(E_ALL);
        }
        else
        {
            ini_set('display_errors', 'Off');
            error_reporting(0);
        }

        self::$errorLevel = $level;
    }

    public static function showException(\Throwable $exception)
    {
        print '<pre>';
        var_dump($exception);
        print '</pre>';
        die;
    }

    public static function logException(\Throwable $exception)
    {
    }

    public static function handleException(\Throwable $exception)
    {
        if (self::$errorLevel)
        {
            self::showException($exception);
        }
        else
        {
            self::logException($exception);
        }
    }
}

set_exception_handler('Debugger::handleException');

