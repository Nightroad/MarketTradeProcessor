<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 31.07.17
 * Time: 20:47
 */

namespace MarketTradeProcessor;
error_reporting(0);
ini_set('display_errors', 'Off');

define('APPLICATION_BASE_DIR', dirname(__FILE__));

require_once 'Shared/Debugger.php';
require_once 'Shared/Config.php';

\Debugger::setDebugLevel(CONFIG_DEBUG_LEVEL);

require_once 'Shared/NamespaceLoader.php';
require_once 'Shared/BasicFunctions.php';

\NamespaceLoader::register(dirname(__FILE__), __NAMESPACE__);

if ('cli' == php_sapi_name())
{
    $cliActionResolver = new Shared\CliActionResolver();
    Shared\ActionResolver::registerResolver($cliActionResolver);
}
else
{
    Shared\ActionResolver::setDefaultPage('/index.html');

    $modRewriteActionResolver = new Shared\ModRewriteRegexpActionResolver();
    Shared\ActionResolver::registerResolver($modRewriteActionResolver);
}

Shared\ActionResolver::handleRequest();