<?php


namespace App\Core;


use App\Services\BinLookUp\BinListApi;
use App\Services\BinLookUp\BinLookup;
use App\Services\CurrencyExchange\CurrencyExchange;
use App\Services\CurrencyExchange\CurrencyExchangeApi;
use App\Services\CurrencyExchange\CurrencyLookup;

class DependencyResolver
{
    protected $dependencies = [];

    protected static $instance;

    public function __construct()
    {
        $this->bind(BinLookup::class, function () {
            return new BinListApi(new CurrencyLookup());
        });
        $this->bind(CurrencyExchange::class, function(){
            return new CurrencyExchangeApi();
        });
    }

    public function bind($abstract, $concrete)
    {
        $this->dependencies[$abstract] = $concrete;
    }

    public function get($abstract)
    {
        if (!isset($this->dependencies[$abstract])) {
            throw new \InvalidArgumentException('Invalid dependency request');
        }
        $concrete = $this->dependencies[$abstract];
        if($concrete instanceof \Closure){
            return $concrete();
        }
        return $concrete;
    }

    public static function create(): self
    {
        if (isset(self::$instance)) {
            return self::$instance;
        }
        self::$instance = new self();
        return self::$instance;
    }
}
