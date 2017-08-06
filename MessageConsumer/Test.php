<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 11:25
 */

namespace MarketTradeProcessor\MessageConsumer;


class Test {

    public static function feed()
    {

        $jsonData = '{"userId": "134256", "currencyFrom": "EUR", "currencyTo": "GBP", "amountSell": 1000,' .
            '"amountBuy": 747.10, "rate": 0.7471, "timePlaced" : "24-JAN-15 10:27:44", "originatingCountry" : "FR"}';

        $currencies = array('EUR', 'GBP', 'CHF', 'USD', 'PLN', 'RUB', 'HKD');
        $countries = array('PL', 'GB', 'US', 'DE', 'BG', 'CA', 'DK', 'ES', 'GR');

        for ($i = 0; $i < 100; $i++)
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

            $curl = curl_init('http://currencyfair.local.pl/consumer');
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

} 