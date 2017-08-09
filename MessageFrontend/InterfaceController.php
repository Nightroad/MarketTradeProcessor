<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 09:52
 */

namespace MarketTradeProcessor\MessageFrontend;

use MarketTradeProcessor\Shared\Template;


class InterfaceController {

    public static function home()
    {
        $twig = Template::getInstance()->getTwig();
        $twig->display('Main.twig', array(
            'title' => 'Market Trade Processor @ Najt.eu',
        ));
    }

} 