<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 31.07.17
 * Time: 22:09
 */

if($_SERVER['RUN_ENVIRONMENT'] == 'developer')
{
    $db_link = 'mysql:host=localhost;dbname=MarketTradeProcessor';
    $db_user = 'root';
    $db_pass = 'jajamikurwaomate';

    $debug_level = 1;
    $twig_cache_enable = 0;

    $http_base_address = 'http://mumble.najt.eu';
//    $message_processor_server = 'http://127.0.0.1:3000';
}
else
{
    $db_link = 'mysql:host=localhost;dbname=mtp';
    $db_user = 'mtp';
    $db_pass = 'foobar';

    $debug_level = 0;
    $twig_cache_enable = 1;

    $http_base_address = 'http://mumble.najt.eu';
//    $message_processor_server = 'http://mtp.najt.eu:3000';
}

define('CONFIG_DB_LINK', $db_link);
define('CONFIG_DB_USER', $db_user);
define('CONFIG_DB_PASS', $db_pass);
define('CONFIG_DEBUG_LEVEL', $debug_level);
define('CONFIG_TWIG_CACHE_ENABLE', $twig_cache_enable);
define('CONFIG_HTTP_BASE_ADDRESS', $http_base_address);

//define('CONFIG_MESSAGE_PROCESSOR_SERVER', $message_processor_server);