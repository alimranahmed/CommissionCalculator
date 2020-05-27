<?php

use App\Services\BinLookUp\BinLookup;
use App\Services\CurrencyExchange\CurrencyExchange;

require __DIR__ . '/vendor/autoload.php';

$inputParser = new \App\Services\Input\InputParser();
$inputLines = $inputParser->getLines(explode("\n", file_get_contents($argv[1])));

$dependencyResolver = \App\Core\DependencyResolver::create();
$binLookup = $dependencyResolver->get(BinLookup::class);
$currencyExchange = $dependencyResolver->get(CurrencyExchange::class);

$calculator = new \App\Core\Calculator($binLookup, $currencyExchange);

foreach ($inputLines as $inputLine) {
    $exchangeAmount = $calculator->calculate($inputLine);
    echo "$exchangeAmount\n";
}
