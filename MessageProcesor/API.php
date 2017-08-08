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

    public static function serveTrades()
    {
        $tradesModel = new Trades();

        if (array_key_exists('page', $_GET))
        {
            $page = intval($_GET['page']);
            if ($page <= 0)
            {
                $page = 1;
            }

        }
        else
        {
            $page = 1;
        }

        if (array_key_exists('limit', $_GET))
        {
            $limit = intval($_GET['limit']);
            if ($limit <= 0)
            {
                $limit = 25;
            }

            if ($limit > 100)
            {
                $limit = 100;
            }

        }
        else
        {
            $limit = 50;
        }

        if (array_key_exists('sort', $_GET))
        {
            $sortInfo = array();
            $sort = json_decode($_GET['sort'], true);

            if (!empty($sort))
            {
                $sortableFields = array('id', 'userid', 'overview', 'currencyfrom', 'currencyto',
                    'timeplaced', 'originatingcountry');

                foreach($sort as $map)
                {
                    $field = strtolower($map['property']);
                    $direction = strtoupper($map['direction']);

                    if (in_array($field, $sortableFields) && ($direction == 'ASC' || $direction == 'DESC'))
                    {
                        $sortInfo[] = $field . ' ' . $direction;
                    }

                    // Just skip the invalid sort information.

                }
            }
            else
            {
                $sortInfo[] = 'timePlaced ASC';
            }

        }
        else
        {
            $sortInfo = array('timePlaced ASC');
        }

        $outputArray = $tradesModel->getRecords($page, $limit, $sortInfo);

        print json_encode($outputArray);
        exit(0);


    }

} 