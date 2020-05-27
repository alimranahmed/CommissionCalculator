<?php

namespace App\Services\BinLookUp;


use App\Services\CurrencyExchange\CurrencyLookup;

abstract class BinLookup
{
    /**
     * @var CurrencyLookup
     */
    protected $currencyLookup;

    public function __construct(CurrencyLookup $currencyLookup)
    {
        $this->currencyLookup = $currencyLookup;
    }

    abstract public function isEu(string $bin): bool;
}
