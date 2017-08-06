<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 16:52
 */

namespace MarketTradeProcessor\MessageProcesor\Models;

use MarketTradeProcessor\MessageProcesor\Entities\_Base as Base_Entity;

class Trades extends _Base {

    protected $dbTable = 'trades';

    protected $dbFields = array(
        'userId', 'currencyFrom', 'currencyTo', 'amountSell',
        'amountBuy', 'rate', 'timePlaced', 'originatingCountry'
    );

    public function collectData(Base_Entity $entity)
    {
        $data = parent::collectData($entity);

        $currencyCodes = new CurrencyCodes();
        $countryCodes = new CountryCodes();

        $data['currencyFrom'] = $currencyCodes->getIdByCode($data['currencyFrom']);
        $data['currencyTo'] = $currencyCodes->getIdByCode($data['currencyTo']);
        $data['originatingCountry'] = $countryCodes->getIdByCode($data['originatingCountry']);

        return $data;
    }

    public function getChartData()
    {
        $pdo = $this->getPDO();

        $sql = '
            SELECT
              t.id,
              t.userId,
              cf.code AS currencyFrom,
              ct.code AS currencyTo
            FROM
              trades AS t
            JOIN
              iso4217 AS cf
              ON t.currencyFrom = cf.id
            JOIN
              iso4217 AS ct
              ON t.currencyTo = ct.id
        ';

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTradesOnDay($day)
    {
        $pdo = $this->getPDO();

        $sql = '
            SELECT
              t.id,
              CONCAT(cf.code, "->", ct.code) AS currency,
              COUNT(t.id) AS trades
            FROM
              trades AS t
            JOIN
              iso4217 AS cf
              ON t.currencyFrom = cf.id
            JOIN
              iso4217 AS ct
              ON t.currencyTo = ct.id
            WHERE
              DATE(t.timePlaced) = :today
            GROUP BY
              currency
            ORDER BY
              currency ASC
        ';

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':today', $day, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}