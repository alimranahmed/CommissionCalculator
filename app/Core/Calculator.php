<?php

namespace App\Core;

use App\Services\BinLookUp\BinLookup;
use App\Services\CurrencyExchange\CurrencyExchange;
use App\Services\Input\InputLine;

class Calculator
{
    /**
     * @var BinLookup
     */
    private $binLookup;
    /**
     * @var CurrencyExchange
     */
    private $currencyExchange;

    public function __construct(BinLookup $binLookup, CurrencyExchange $currencyExchange)
    {
        $this->binLookup = $binLookup;
        $this->currencyExchange = $currencyExchange;
    }

    public function calculate(InputLine $inputLine):float
    {
        $isEu = $this->binLookup->isEu($inputLine->bin);
        $exchangedAmount = $this->currencyExchange->exchangeAmount($inputLine->amount, $inputLine->currency);
        $commission = $this->getCommission($exchangedAmount, $isEu);
        return round($commission, 2, PHP_ROUND_HALF_UP);
    }

    protected function getCommission(float $amount, bool $isEu): float
    {
        return $amount * ($isEu ? 0.01 : 0.02);
    }
}
