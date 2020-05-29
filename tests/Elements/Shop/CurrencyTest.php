<?php

namespace Rohos\RsYaYml\Tests\Elements\Shop;

use PHPUnit\Framework\TestCase;
use Rohos\RsYaYml\Elements\Shop\Currency;

/**
 * Class CategoryTest
 * @package Rohos\RsYaYml\Tests\Elements\Shop
 */
class CurrencyTest extends TestCase
{
    /**
     * @param $id
     * @param $rate
     * @param $excepted
     * @param $isEquals
     *
     * @test
     * @dataProvider dataForTest
     */
    public function isCrearedCorrectXml($id, $rate, $excepted, $isEquals): void
    {
        $currency = new Currency($id, $rate);

        if ($isEquals) {
            $this->assertEquals($excepted, $currency->getXml());
        } else {
            $this->assertNotEquals($excepted, $currency->getXml());
        }
    }

    /** @test */
    public function isCorrectElementName(): void
    {
        $currency = new Currency('id', 'name');
        $this->assertEquals('currency', $currency->elementName());
    }

    /**
     * @return array
     */
    public function dataForTest(): array
    {
        $tpl = '<currency id="%s" rate="%s"/>';
        $id = Currency::ID_RUR;
        $rate = 'rate-test-2';
        $exceptedTrue = sprintf($tpl, $id, $rate);
        $exceptedFalse = sprintf($tpl, 'test-1', 'test-1');

        return [
            [$id, $rate, $exceptedTrue, true],
            [$id, $rate, $exceptedFalse, false],
        ];
    }
}