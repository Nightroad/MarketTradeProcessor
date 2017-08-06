<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 09:49
 */

namespace MarketTradeProcessor\MessageFrontend;


class ErrorPagesController {

    public static function unhandled()
    {
        print 'unhandled';
    }

    public static function pageError()
    {
        print 'pageError';
    }

} 