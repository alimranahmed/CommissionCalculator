<?php


namespace App\Services\Input;


class InputLine
{
    public $bin;
    public $amount;
    public $currency;

    public function __construct($bin, $amount, $currency)
    {
        $this->bin = $bin;
        $this->amount = $amount;
        $this->currency = $currency;
    }
}
