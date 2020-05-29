<?php

namespace Rohos\RsYaYml\Tests\Elements\Shop;

use PHPUnit\Framework\TestCase;
use Rohos\RsYaYml\Elements\Shop\Offer\OfferTour;

/**
 * Class OfferTourTest
 * @package Rohos\RsYaYml\Tests\Elements\Shop
 */
class OfferTourTest extends TestCase
{
    /**
     * @param mixed $id
     * @param bool $available
     * @test
     * @dataProvider dataForAttributes
     */
    public function isCorrectAttributes($id, $available): void
    {
        $offer = new OfferTour($id, $available);
        $xml = $offer->getXml();
        $type = 'tour';

        $this->assertStringContainsString(sprintf('id="%s"', $id), $xml);
        $this->assertStringContainsString(sprintf('available="%s"', $this->boolToStr($available)), $xml);
        $this->assertStringContainsString(sprintf('type="%s"', $type), $xml);

        $this->assertEquals($type, $offer->getAttrType());
        $this->assertEquals('offer', $offer->elementName());
    }

    /**
     * @param array $data
     * @test
     * @dataProvider dataForElements
     */
    public function isCorrectElements($data): void
    {
        $offer = new OfferTour('id-2', true);

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
                    'setWorldRegion' => [
                        'val' => 'Африка', 'str' => sprintf('<worldRegion>%s</worldRegion>', 'Африка')
                    ],
                    'setCountry' => [
                        'val' => 'Египет', 'str' => sprintf('<country>%s</country>', 'Египет')
                    ],
                    'setRegion' => [
                        'val' => 'Хургада', 'str' => sprintf('<region>%s</region>', 'Хургада')
                    ],
                    'setDays' => [
                        'val' => 7, 'str' => sprintf('<days>%s</days>', 7)
                    ],
                    'setDataTour' => [
                        'val' => '01/01/03', 'str' => sprintf('<dataTour>%s</dataTour>', '01/01/03')
                    ],
                    'setName' => [
                        'val' => 'Hilton', 'str' => sprintf('<name>%s</name>', 'Hilton')
                    ],
                    'setHotelStars' => [
                        'val' => '5*****', 'str' => sprintf('<hotel_stars>%s</hotel_stars>', '5*****')
                    ],
                    'setRoom' => [
                        'val' => 'SNG', 'str' => sprintf('<room>%s</room>', 'SNG')
                    ],
                    'setMeal' => [
                        'val' => 'All', 'str' => sprintf('<meal>%s</meal>', 'All')
                    ],
                    'setIncluded' => [
                        'val' => 'авиаперелет, трансфер', 'str' => sprintf('<included>%s</included>', 'авиаперелет, трансфер')
                    ],
                    'setTransport' => [
                        'val' => 'Авиа', 'str' => sprintf('<transport>%s</transport>', 'Авиа')
                    ],
                    // OfferDeliverable
                    'setDelivery' => [
                        'val' => true, 'str' => sprintf('<delivery>%s</delivery>', $this->boolToStr(true))
                    ],
                    'setDeliveryOptions' => [
                        'val' => 'Delivery Options', 'str' => sprintf('<delivery-options>%s</delivery-options>', 'Delivery Options')
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