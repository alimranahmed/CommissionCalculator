<?php

namespace Tests\Unit\Input;

use App\Services\Input\InputLine;
use App\Services\Input\InputParser;
use PHPUnit\Framework\TestCase;

class InputParserTest extends TestCase
{
    public function testGetLines()
    {
        $input = [
            '{"bin":"45717360","amount":"100.00","currency":"EUR"}',
            '{"bin":"4745030","amount":"2000.00","currency":"GBP"}',
        ];

        $inputParser = new InputParser();
        $inputLines = $inputParser->getLines($input);

        $this->assertCount(2, $inputLines);

        foreach ($inputLines as $inputLine){
            $this->assertInstanceOf(InputLine::class, $inputLine);
        }

        $this->assertEquals(45717360, $inputLines[0]->bin);
        $this->assertEquals(100.0, $inputLines[0]->amount);
        $this->assertEquals('EUR', $inputLines[0]->currency);

        $this->assertEquals(4745030, $inputLines[1]->bin);
        $this->assertEquals(2000.00, $inputLines[1]->amount);
        $this->assertEquals('GBP', $inputLines[1]->currency);
    }
}
