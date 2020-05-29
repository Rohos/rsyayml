<?php

namespace Rohos\RsYaYml\Tests\Elements\Shop;

use PHPUnit\Framework\TestCase;
use Rohos\RsYaYml\Elements\Shop\Offer\OfferVendorModel;

/**
 * Class OfferVendorModelTest
 * @package Rohos\RsYaYml\Tests\Elements\Shop
 */
class OfferVendorModelTest extends TestCase
{
    /**
     * @param mixed $id
     * @param bool $available
     * @test
     * @dataProvider dataForAttributes
     */
    public function isCorrectAttributes($id, $available): void
    {
        $offer = new OfferVendorModel($id, $available);
        $xml = $offer->getXml();
        $type = 'vendor.model';

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
        $offer = new OfferVendorModel('id-2', true);

        foreach ($data as $method => $item) {
            $offer->{$method}($item['val']);
        }

        $xml = $offer->getXml();

        foreach ($data as $method => $item) {
            $this->assertStringContainsString($item['str'], $xml);
        }
    }

    /**
     * @param string $name
     * @param mixed $value
     * @param string $unit
     * @test
     * @dataProvider dataForParams
     */
    public function isCorrectParams($name, $value, $unit): void
    {
        $offer = new OfferVendorModel('id-3', true);

        if ($unit) {
            $str = sprintf('<param name="%s" unit="%s">%s</param>', $name, $unit, $value);
        } else {
            $str = sprintf('<param name="%s">%s</param>', $name, $value);
        }

        $offer->setParam($name, $value, $unit);

        $xml = $offer->getXml();

        $this->assertStringContainsString($str, $xml);
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
                    'setModel' => [
                        'val' => 'model1', 'str' => sprintf('<model>%s</model>', 'model1')
                    ],
                    'setTypePrefix' => [
                        'val' => 'Type Prefix', 'str' => sprintf('<typePrefix>%s</typePrefix>', 'Type Prefix')
                    ],
                    'setSalesNote' => [
                        'val' => 'Sales Notes', 'str' => sprintf('<sales_notes>%s</sales_notes>', 'Sales Notes')
                    ],
                    'setCountryOfOrigin' => [
                        'val' => 'Россия', 'str' => sprintf('<country_of_origin>%s</country_of_origin>', 'Россия')
                    ],
                    'setManufacturerWarranty' => [
                        'val' => true, 'str' => sprintf('<manufacturer_warranty>%s</manufacturer_warranty>', $this->boolToStr(true))
                    ],
                    'setDownloadable' => [
                        'val' => true, 'str' => sprintf('<downloadable>%s</downloadable>', $this->boolToStr(true))
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
     * @return array
     */
    public function dataForParams(): array
    {
        return [
            ['Pages', 1000, 'стр'],
            ['Тип печати', 'Цветная', null],
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