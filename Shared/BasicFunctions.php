<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 10:25
 */

function GetRawJSONPostMessage()
{
    $raw = trim(file_get_contents('php://input'));

    if (empty($raw))
    {
        return false;
    }

    return json_decode($raw, true);
}

function PathJoin()
{
    return join(DIRECTORY_SEPARATOR, func_get_args());
}

function InitComposer()
{
    $autoloadPath = PathJoin(APPLICATION_BASE_DIR, 'vendor', 'autoload.php');
    require_once $autoloadPath;
}