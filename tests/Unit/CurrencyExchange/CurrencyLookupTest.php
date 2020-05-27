<?php


namespace Tests\Unit\CurrencyExchange;


use App\Services\CurrencyExchange\CurrencyLookup;
use PHPUnit\Framework\TestCase;

class CurrencyLookupTest extends TestCase
{
    public function testIsEu()
    {
        $currencyLookup = new CurrencyLookup();
        $this->assertTrue($currencyLookup->isEu('BG'));
        $this->assertFalse($currencyLookup->isEu('BD'));
    }
}
