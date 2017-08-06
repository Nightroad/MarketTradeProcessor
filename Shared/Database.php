<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 13:03
 */

namespace MarketTradeProcessor\Shared;


class Database {

    /**
     * @var \PDO
     */
    private static $pdo = null;

    /**
     * @return \PDO
     */
    public static function getPDO()
    {
        if (null == self::$pdo)
        {
            self::$pdo = new \PDO(CONFIG_DB_LINK, CONFIG_DB_USER, CONFIG_DB_PASS);
            self::$pdo->query('SET NAMES utf8');
        }

        return self::$pdo;
    }

} 