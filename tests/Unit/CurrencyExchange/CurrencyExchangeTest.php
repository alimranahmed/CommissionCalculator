<?php


namespace Tests\Unit\CurrencyExchange;


use PHPUnit\Framework\TestCase;

class CurrencyExchangeTest extends TestCase
{
    public function testExchangeAmount()
    {
        $currencyExchange = \Mockery::mock('CurrencyExchange');
        $currencyExchange->shouldReceive('exchangeAmount')->once()->andReturn(95);

        $amount = $currencyExchange->exchangeAmount(1, 'BDT');
        $this->assertEquals(95, $amount);
    }
}
