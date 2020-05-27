<?php


namespace App\Services\CurrencyExchange;


class CurrencyExchangeApi extends CurrencyExchange
{

    public function exchangeAmount(float $amount, string $fromCurrency): float
    {
        $rate = @json_decode(file_get_contents('https://api.exchangeratesapi.io/latest'), true)['rates'][$fromCurrency];
        if ($fromCurrency == 'EUR' or $rate == 0) {
            return $amount;
        }

        if ($fromCurrency != 'EUR' or $rate > 0) {
            $amount = $amount / $rate;
        }

        return $amount;
    }
}
