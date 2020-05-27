<?php


namespace Tests\Unit\BinLookup;


use PHPUnit\Framework\TestCase;

class BinLookupTest extends TestCase
{
    public function testIsEu()
    {
        $binLookup = \Mockery::mock('BinLookup');
        $binLookup->shouldReceive('isEu')->once()->andReturn(false);
        $this->assertFalse($binLookup->isEu('BD'));
    }
}
