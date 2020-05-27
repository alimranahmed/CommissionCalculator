<?php


namespace App\Services\CurrencyExchange;


class CurrencyLookup
{
    private $euCurrencies = [
        'AT',
        'BE',
        'BG',
        'CY',
        'CZ',
        'DE',
        'DK',
        'EE',
        'ES',
        'FI',
        'FR',
        'GR',
        'HR',
        'HU',
        'IE',
        'IT',
        'LT',
        'LU',
        'LV',
        'MT',
        'NL',
        'PO',
        'PT',
        'RO',
        'SE',
        'SI',
        'SK',
    ];

    public function isEu(string $currency): bool
    {
        return in_array($currency, $this->euCurrencies);
    }
}
