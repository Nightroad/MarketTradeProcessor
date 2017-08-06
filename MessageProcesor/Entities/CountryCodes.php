<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 13:43
 */

namespace MarketTradeProcessor\MessageProcesor\Entities;


class CountryCodes extends _Base {

    protected $code;

    protected $country;

    protected $dbFields = array('code', 'country');

    protected $dbTable = 'iso3166alpha2';

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

} 