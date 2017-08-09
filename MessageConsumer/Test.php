<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 11:25
 */

namespace MarketTradeProcessor\MessageConsumer;


class Test {

    const FEED_PREDEFINED = 1;
    const FEED_RANDOM = 2;

    private static $feedType = self::FEED_PREDEFINED;

    public static function feed()
    {

        if (empty(self::$feedType))
        {
            self::unableToFeed();
        }

        switch (self::$feedType)
        {
            case self::FEED_PREDEFINED:
                self::feedPreDefined();
                break;
            case self::FEED_RANDOM:
                self::feedRandomData();
                break;
            default:
                self::unableToFeed();
        }

    }

    private static function unableToFeed()
    {
        print 'Don\'t know how to feed application data, see the $feedType in MessageConsumer\\Test.php';
        exit();
    }

    private static function feedRandomData($amount = 50)
    {
        $currencies = array('EUR', 'GBP', 'CHF', 'USD', 'PLN', 'RUB', 'HKD');
        $countries = array('PL', 'GB', 'US', 'DE', 'BG', 'CA', 'DK', 'ES', 'GR');

        for ($i = 0; $i < $amount; $i++)
        {

            $sell = round(rand(1000, 900000) / 500, 2);
            $buy = round(rand(1000, 900000) / 500, 2);
            $time = strtoupper(date('y-M-d H:i:s'));

            $jsonDataArray = array(
                'userId' => rand(10, 999999),
                'currencyFrom' => $currencies[array_rand($currencies)],
                'currencyTo' => $currencies[array_rand($currencies)],
                'amountSell' => $sell,
                'amountBuy' => $buy,
                'rate' => round($sell / $buy, 5),
                'timePlaced' => $time,
                'originatingCountry' => $countries[array_rand($countries)],
            );
            $jsonData = json_encode($jsonDataArray);

            $curl = curl_init(CONFIG_HTTP_BASE_ADDRESS . '/consumer');
            curl_setopt_array($curl, array(
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $jsonData,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($jsonData)
                )
            ));

            $result = curl_exec($curl);
            print $result;

        }
    }

    private static function feedPreDefined()
    {

        $jsonData = '{"userId": "134256", "currencyFrom": "EUR", "currencyTo": "GBP", "amountSell": 1000,' .
            '"amountBuy": 747.10, "rate": 0.7471, "timePlaced" : "24-JAN-15 10:27:44", "originatingCountry" : "FR"}';

        $curl = curl_init(CONFIG_HTTP_BASE_ADDRESS . '/consumer');
        curl_setopt_array($curl, array(
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($jsonData)
            )
        ));

        $result = curl_exec($curl);

        if (0 != ($errNo = curl_errno($curl)))
        {
            print 'Couldn\'t contact remote server. CURL returned error code: ' . $errNo . PHP_EOL;
            print curl_error($curl) . PHP_EOL;
            exit();
        }
        else
        {
            $result = json_decode($result, true);
            if (0 != ($errNo = json_last_error()))
            {
                print 'Got invalid response from server, can\'t decode return string. Error code: ' . $errNo . PHP_EOL;
                print json_last_error_msg() . PHP_EOL;
                exit();
            }
            else
            {
                print_r($result);
                exit();
            }
        }

    }

} 