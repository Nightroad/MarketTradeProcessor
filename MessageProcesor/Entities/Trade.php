<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 10:35
 */

namespace MarketTradeProcessor\MessageProcesor\Entities;

use MarketTradeProcessor\Shared\ISO4217;
use MarketTradeProcessor\Shared\ISO3166_1_ALPHA2;


class Trade extends _Base {

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var string
     */
    protected $currencyFrom;

    /**
     * @var string
     */
    protected $currencyTo;

    /**
     * @var float
     */
    protected $amountSell;

    /**
     * @var float
     */
    protected $amountBuy;

    /**
     * @var float
     */
    protected $rate;

    /**
     * @var \Datetime
     */
    protected $timePlaced;

    /**
     * @var string
     */
    protected $originatingCountry;

    private $_validateErrors = array();

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param float $amountBuy
     */
    public function setAmountBuy($amountBuy)
    {
        $this->amountBuy = $amountBuy;
    }

    /**
     * @return float
     */
    public function getAmountBuy()
    {
        return $this->amountBuy;
    }

    /**
     * @param float $amountSell
     */
    public function setAmountSell($amountSell)
    {
        $this->amountSell = $amountSell;
    }

    /**
     * @return float
     */
    public function getAmountSell()
    {
        return $this->amountSell;
    }

    /**
     * @param string $currencyFrom
     */
    public function setCurrencyFrom($currencyFrom)
    {
        $this->currencyFrom = $currencyFrom;
    }

    /**
     * @return string
     */
    public function getCurrencyFrom()
    {
        return $this->currencyFrom;
    }

    /**
     * @param string $currencyTo
     */
    public function setCurrencyTo($currencyTo)
    {
        $this->currencyTo = $currencyTo;
    }

    /**
     * @return string
     */
    public function getCurrencyTo()
    {
        return $this->currencyTo;
    }

    /**
     * @param string $originatingCountry
     */
    public function setOriginatingCountry($originatingCountry)
    {
        $this->originatingCountry = $originatingCountry;
    }

    /**
     * @return string
     */
    public function getOriginatingCountry()
    {
        return $this->originatingCountry;
    }

    /**
     * @param float $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param \Datetime $timePlaced
     */
    public function setTimePlaced($timePlaced)
    {
        $this->timePlaced = $timePlaced;
    }

    /**
     * @return \Datetime
     */
    public function getTimePlaced()
    {
        return $this->timePlaced;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    public function validate()
    {
        $valid = true;

        // Field: userId
        if (empty($this->userId))
        {
            $this->_validateErrors[] = 'No userId provided';
            $valid = false;
        }

        else if (!is_int($this->userId))
        {
            $this->_validateErrors[] = 'userId must be integer';
            $valid = false;
        }

        // Field: currencyFrom
        if (empty($this->currencyFrom))
        {
            $this->_validateErrors[] = 'No currencyFrom provided';
            $valid = false;
        }
        else if (!ISO4217::isCodeValid($this->currencyFrom))
        {
            $this->_validateErrors[] = 'currencyFrom must be valid ISO4217 code';
            $valid = false;
        }

        // Field: currencyTo
        if (empty($this->currencyTo))
        {
            $this->_validateErrors[] = 'No currencyTo provided';
            $valid = false;
        }
        else if (!ISO4217::isCodeValid($this->currencyTo))
        {
            $this->_validateErrors[] = 'currencyTo must be valid ISO4217 code';
            $valid = false;
        }

        // TODO(bturkot): Check if currency is the same. Cause no point for that.

        // Field: amountBuy
        if (empty($this->amountBuy))
        {
            $this->_validateErrors[] = 'No amountBuy provided';
            $valid = false;
        }
        else if (!is_float($this->amountBuy))
        {
            $this->_validateErrors[] = 'amountBuy must be a valid float number';
            $valid = false;
        }
        else if ($this->amountBuy <= 0)
        {
            $this->_validateErrors[] = 'amountBuy must be greater than 0';
            $valid = false;
        }

        // Field: amountSell
        if (empty($this->amountSell))
        {
            $this->_validateErrors[] = 'No amountSell provided';
            $valid = false;
        }
        else if (!is_float($this->amountSell))
        {
            $this->_validateErrors[] = 'amountSell must be a valid float number';
            $valid = false;
        }
        else if ($this->amountSell <= 0)
        {
            $this->_validateErrors[] = 'amountSell must be greater than 0';
            $valid = false;
        }

        // Field: rate
        if (empty($this->rate))
        {
            $this->_validateErrors[] = 'No rate provided';
            $valid = false;
        }
        else if (!is_float($this->rate))
        {
            $this->_validateErrors[] = 'rate must be a valid float number';
            $valid = false;
        }

        // Field: timePlaced
        if (empty($this->timePlaced))
        {
            $this->_validateErrors[] = 'No or invalid timePlaced provided';
            $valid = false;
        }

        // Field: originatingCountry
        if (empty($this->originatingCountry))
        {
            $this->_validateErrors[] = 'No originatingCountry provided';
            $valid = false;
        }
        else if (!ISO3166_1_ALPHA2::isCodeValid($this->originatingCountry))
        {
            $this->_validateErrors[] = 'originatingCountry is not valid ISO 3166-1 ALPHA-2 code';
            $valid = false;
        }

        return $valid;

    }

    public function getValidationErrors()
    {
        return $this->_validateErrors;
    }

}