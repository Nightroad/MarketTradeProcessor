<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 08:49
 */

namespace MarketTradeProcessor\Shared;

abstract class ActionResolver
{

    private static $resolvers = array();

    protected $runAction = null;

    abstract public function canHandleRequest();

    public function getRunAction()
    {
        return $this->runAction;
    }

    public static function registerResolver(ActionResolver $resolver)
    {
        if (in_array($resolver, self::$resolvers))
            return false;

        self::$resolvers[] = $resolver;
    }

    public static function setDefaultPage($address)
    {
        if ('/' == $_SERVER['REQUEST_URI'] || empty($_SERVER['REQUEST_URI']))
        {
            // header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $address);
            exit();
        }
    }

    public static function handleRequest()
    {

        $actionCallable = null;
        foreach(self::$resolvers as $resolver)
        {
            if ($resolver->canHandleRequest())
            {
                $actionCallable = $resolver->getRunAction();
                break;
            }
        }

        if (null === $actionCallable)
        {
            $actionCallable = '\\MarketTradeProcessor\\MessageFrontend\\ErrorPagesController::unhandled';
        }

        if(is_callable($actionCallable))
        {
            call_user_func($actionCallable);
            return true;
        }
        else
        {
            $actionCallable = '\\MarketTradeProcessor\\MessageFrontend\\ErrorPagesController::pageError';
            call_user_func($actionCallable);
            return false;
        }

    }

} 