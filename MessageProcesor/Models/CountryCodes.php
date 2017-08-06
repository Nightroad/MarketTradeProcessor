<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 17:30
 */

namespace MarketTradeProcessor\MessageProcesor\Models;


class CountryCodes extends _Base {

    protected $dbTable = 'iso3166alpha2';

    public function getIdByCode($code)
    {
        $row = $this->getByFieldValue('code', $code);

        if ($row)
        {
            return intval($row['id']);
        }
        else
        {
            return null;
        }

    }

} 