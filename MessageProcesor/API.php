<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 06.08.17
 * Time: 18:06
 */

namespace MarketTradeProcessor\MessageProcesor;

use MarketTradeProcessor\MessageProcesor\Models\Trades;


class API {

    public static function serveSocketIO()
    {
        // WA for origin error
        header('content-type: text/javascript');
        print file_get_contents(CONFIG_MESSAGE_PROCESSOR_SERVER . '/socket.io/socket.io.js');
        exit(0);
    }

    public static function readConfig()
    {
        print CONFIG_MESSAGE_PROCESSOR_SERVER;
        exit(0);
    }

    public static function getChartData()
    {
        $tradesModel = new Trades();
        $records = null;

        switch($_SERVER['argv'][2])
        {
            case 'tradesOnDay':
                $records = $tradesModel->getTradesOnDay(date('Y-m-d'));
                break;
        }

        echo json_encode($records);
        exit();
    }

} 