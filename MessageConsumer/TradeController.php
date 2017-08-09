<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 10:22
 */

namespace MarketTradeProcessor\MessageConsumer;

use MarketTradeProcessor\MessageProcesor\Models\Trades;
use MarketTradeProcessor\MessageProcesor\Entities\Trade;
use MarketTradeProcessor\Shared\Template;


class TradeController {

    public static function consume()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
        {
            self::showConsumeUsage();
        }
        else
        {
            $inputData = GetRawJSONPostMessage();

            if (null === $inputData || false === $inputData)
            {
                print 'Empty data or invalid JSON message';
                return;
            }

            if (false !== ($field = self::isAnyRequiredFieldNotProvided($inputData)))
            {
                print 'The following required field is not in $_POST json: ' . $field;
                return;
            }

            $inputEntity = self::bindToEntity($inputData);
            $output = array(
                'success' => false,
            );

            $tradesModel = new Trades();

            if ($inputEntity->validate())
            {
                if ($tradesModel->save($inputEntity))
                {
                    $output['success'] = true;
                }
                else
                {
                    $output['success'] = false;
                    $output['errors'] = array('Unable to store data from index');
                }

            }
            else
            {
                $output['success'] = false;
                $output['errors'] = $inputEntity->getValidationErrors();
            }

            echo json_encode($output);
            exit(0);

        }

    }

    private static function isAnyRequiredFieldNotProvided($input)
    {
        $required = array(
            'userId', 'currencyFrom', 'currencyTo', 'amountSell', 'amountBuy',
            'rate', 'timePlaced', 'originatingCountry'
        );

        foreach($required as $field)
        {
            if(!array_key_exists($field, $input))
            {
                return $field;
            }
        }

        return false;
    }

    private static function bindToEntity($input)
    {
        $entity = new Trade();

        $entity->setUserId(intval($input['userId']));
        $entity->setCurrencyFrom(strtoupper($input['currencyFrom']));
        $entity->setCurrencyTo(strtoupper($input['currencyTo']));
        $entity->setAmountSell(floatval($input['amountSell']));
        $entity->setAmountBuy(floatval($input['amountBuy']));
        $entity->setRate(floatval($input['rate']));
        $entity->setTimePlaced(\DateTime::createFromFormat('d-M-y H:i:s', $input['timePlaced']));
        $entity->setOriginatingCountry($input['originatingCountry']);

        return $entity;
    }

    private static function showConsumeUsage()
    {
        $twig = Template::getInstance()->getTwig();
        $twig->display('ConsumeMessage.twig', array(
            'title' => 'Market Trade Processor @ Najt.eu',
        ));

    }

} 