<?php

namespace League\Omnipay\Common;

use League\Omnipay\Common\Currency;
use League\Omnipay\TestCase;

class CurrencyTest extends TestCase
{
    public function testFind()
    {
        $currency = Currency::find('USD');

        $this->assertSame('USD', $currency->getCode());
        $this->assertSame('840', $currency->getNumeric());
        $this->assertSame(2, $currency->getDecimals());
    }

    public function testFindLowercase()
    {
        $currency = Currency::find('usd');

        $this->assertSame('USD', $currency->getCode());
        $this->assertSame('840', $currency->getNumeric());
        $this->assertSame(2, $currency->getDecimals());
    }

    public function testNumericCodeReturnsNull()
    {
        $currency = Currency::find('840');

        $this->assertNull($currency);
    }

    public function testUnknownCurrencyReturnsNull()
    {
        $currency = Currency::find('XYZ');

        $this->assertNull($currency);
    }

    public function testAll()
    {
        $currencies = Currency::all();

        $this->assertTrue(isset($currencies['USD']));
        $this->assertFalse(isset($currencies['XYZ']));
    }
}
