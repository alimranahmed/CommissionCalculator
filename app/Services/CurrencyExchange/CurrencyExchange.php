<?php


namespace App\Services\CurrencyExchange;


abstract class CurrencyExchange
{
    abstract public function exchangeAmount(float $amount, string $fromCurrency): float;
}
