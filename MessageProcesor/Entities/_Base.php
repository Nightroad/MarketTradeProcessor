<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 13:07
 */

namespace MarketTradeProcessor\MessageProcesor\Entities;

abstract class _Base {

    protected $id;

    public function recordExists()
    {
        return ($this->id != null);
    }

}