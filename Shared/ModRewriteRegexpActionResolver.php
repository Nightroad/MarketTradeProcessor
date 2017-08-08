<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 02.08.17
 * Time: 20:19
 */

namespace MarketTradeProcessor\Shared;

class ModRewriteRegexpActionResolver extends ActionResolver
{

    private static $mapping = array(
//        '#^/socket\.io\.js#' => '\\MarketTradeProcessor\\MessageProcesor\\API::serveSocketIO',
        '#^/consumer#' => '\\MarketTradeProcessor\\MessageConsumer\\TradeController::consume',
        '#^/index\.html#si' => '\\MarketTradeProcessor\\MessageFrontend\\InterfaceController::home',
        '#^/ajax/trades#' => '\\MarketTradeProcessor\\MessageProcesor\\API::serveTrades',
    );

    public function getActionByAddress($address)
    {
        foreach(self::$mapping as $regexp => $action)
        {
            if(preg_match($regexp, $address))
            {
                $this->runAction = $action;
                return $address;
            }
        }

        return false;
    }

    public function getConfigFromRequestURI()
    {
        return $this->getActionByAddress($_SERVER['REQUEST_URI']);
    }

    public function canHandleRequest()
    {
        return (false !== self::getConfigFromRequestURI());
    }

}