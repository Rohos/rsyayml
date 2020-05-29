<?php

namespace Rohos\RsYaYml\Tests\Elements\Shop;

use PHPUnit\Framework\TestCase;
use Rohos\RsYaYml\Elements\Shop\Offer\OfferSimple;

/**
 * Class OfferSimpleTest
 * @package Rohos\RsYaYml\Tests\Elements\Shop
 */
class OfferSimpleTest extends TestCase
{
    /**
     * @param mixed $id
     * @param bool $available
     * @test
     * @dataProvider dataForAttributes
     */
    public function isCorrectAttributes($id, $available): void
    {
        $offer = new OfferSimple($id, $available);
        $xml = $offer->getXml();

        $this->assertStringContainsString(sprintf('id="%s"', $id), $xml);
        $this->assertStringContainsString(sprintf('available="%s"', $this->boolToStr($available)), $xml);
        $this->assertStringNotContainsString('type="', $xml);

        $this->assertEquals('', $offer->getAttrType());
        $this->assertEquals('offer', $offer->elementName());
    }

    /**
     * @param array $data
     * @test
     * @dataProvider dataForElements
     */
    public function isCorrectElements($data): void
    {
        $offer = new OfferSimple('id-2', true);

        foreach ($data as $method => $item) {
            $offer->{$method}($item['val']);
        }

        $xml = $offer->getXml();

        foreach ($data as $method => $item) {
            $this->assertStringContainsString($item['str'], $xml);
        }
    }

    /**
     * @return array
     */
    public function dataForAttributes(): array
    {
        return [
            ['id-1', true],
            ['id-2', false],
        ];
    }

    /**
     * @return array
     */
    public function dataForElements(): array
    {
        return [
            [
                [
                    'setUrl' => [
                        'val' => '/test', 'str' => sprintf('<url>%s</url>', '/test')
                    ],
                    'setPrice' => [
                        'val' => 110, 'str' => sprintf('<price>%s</price>', '110')
                    ],
                    'setCurrencyId' => [
                        'val' => 'RUR', 'str' => sprintf('<currencyId>%s</currencyId>', 'RUR')
                    ],
                    'setCategoryId' => [
                        'val' => 1, 'str' => sprintf('<categoryId>%s</categoryId>', 1)
                    ],
                    'setDescription' => [
                        'val' => 'Description', 'str' => sprintf('<description><![CDATA[%s]]></description>', 'Description')
                    ],
                    'setAdult' => [
                        'val' => true, 'str' => sprintf('<adult>%s</adult>', $this->boolToStr(true))
                    ],
                    // OfferCountryOfOriginable
                    'setCountryOfOrigin' => [
                        'val' => 'Россия', 'str' => sprintf('<country_of_origin>%s</country_of_origin>', 'Россия')
                    ],
                    // OfferDeliverable
                    'setDelivery' => [
                        'val' => true, 'str' => sprintf('<delivery>%s</delivery>', $this->boolToStr(true))
                    ],
                    'setDeliveryOptions' => [
                        'val' => 'Delivery Options', 'str' => sprintf('<delivery-options>%s</delivery-options>', 'Delivery Options')
                    ],
                    // OfferVendorable
                    'setVendor' => [
                        'val' => 'Vendor', 'str' => sprintf('<vendor>%s</vendor>', 'Vendor')
                    ],
                    'setVendorCode' => [
                        'val' => 'Vendor Code', 'str' => sprintf('<vendorCode>%s</vendorCode>', 'Vendor Code')
                    ],
                ]
            ],
        ];
    }

    /**
     * @param bool $value
     * @return string
     */
    protected function boolToStr(bool $value): string
    {
        return $value ? 'true' : 'false';
    }
}