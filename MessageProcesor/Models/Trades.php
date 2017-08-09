<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 16:52
 */

namespace MarketTradeProcessor\MessageProcesor\Models;

use MarketTradeProcessor\MessageProcesor\Entities\_Base as Base_Entity;
use MarketTradeProcessor\Shared\Database;

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

    public function getRecords($pageNo = 1, $recordsPerPage = 50, $sortInfo = array('id ASC'))
    {

        $pdo = Database::getPDO();

        $queryString = sprintf('
          SELECT SQL_CALC_FOUND_ROWS
            t.id,
            t.userId,
            CONCAT("Sell ", t.amountSell, " ", cf.country, " for ", t.amountBuy, " ", ct.country) AS overview,
            cf.code AS currencyFrom,
            ct.code AS currencyTo,
            t.rate,
            t.timePlaced,
            oc.country AS originatingCountry,
            t.amountSell,
            t.amountBuy
          FROM
            %s AS t
          JOIN
            iso4217 AS cf
            ON t.currencyFrom = cf.id
          JOIN
            iso4217 AS ct
            ON t.currencyTo = ct.id
          JOIN
            iso3166alpha2 AS oc
            ON t.originatingCountry = oc.id
          ORDER BY
            %s
          LIMIT %d, %d
        ', $this->dbTable, join(",\n", $sortInfo), ($pageNo - 1), $recordsPerPage);

        $stmt = $pdo->prepare($queryString);
        $stmt->execute();

        if ($stmt->errorCode() > 0)
        {
            return array(
                'data' => null,
                'total' => 0,
                'errorMessage' => 'Couldn\'t handle your request, please check if the URL is valid.'
            );
        }

        return array(
            'data' => $stmt->fetchAll($pdo::FETCH_ASSOC),
            'total' => $pdo->query('SELECT FOUND_ROWS()')->fetch($pdo::FETCH_COLUMN),
        );

    }

}