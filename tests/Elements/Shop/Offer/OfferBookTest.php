<?php

namespace Rohos\RsYaYml\Tests\Elements\Shop;

use PHPUnit\Framework\TestCase;
use Rohos\RsYaYml\Elements\Shop\Offer\OfferBook;

/**
 * Class OfferBookTest
 * @package Rohos\RsYaYml\Tests\Elements\Shop
 */
class OfferBookTest extends TestCase
{
    /**
     * @param mixed $id
     * @param bool $available
     * @test
     * @dataProvider dataForAttributes
     */
    public function isCorrectAttributes($id, $available): void
    {
        $offer = new OfferBook($id, $available);
        $xml = $offer->getXml();
        $type = 'book';

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
        $offer = new OfferBook('id-2', true);

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
                    'setAuthor' => [
                        'val' => 'Author', 'str' => sprintf('<author>%s</author>', 'Author')
                    ],
                    'setName' => [
                        'val' => 'Name', 'str' => sprintf('<name>%s</name>', 'Name')
                    ],
                    'setPublisher' => [
                        'val' => 'Publisher', 'str' => sprintf('<publisher>%s</publisher>', 'Publisher')
                    ],
                    'setISBN' => [
                        'val' => '978-5-9677-0757-5', 'str' => sprintf('<ISBN>%s</ISBN>', '978-5-9677-0757-5')
                    ],
                    'setLanguage' => [
                        'val' => 'rus', 'str' => sprintf('<language>%s</language>', 'rus')
                    ],
                    'setYear' => [
                        'val' => 2008, 'str' => sprintf('<year>%s</year>', 2008)
                    ],
                    'setVolume' => [
                        'val' => 2, 'str' => sprintf('<volume>%s</volume>', 2)
                    ],
                    'setPart' => [
                        'val' => 1, 'str' => sprintf('<part>%s</part>', 1)
                    ],
                    'setDownloadable' => [
                        'val' => true, 'str' => sprintf('<downloadable>%s</downloadable>', $this->boolToStr(true))
                    ],
                    'setSeries' => [
                        'val' => 'А. Маринина', 'str' => sprintf('<series>%s</series>', 'А. Маринина')
                    ],
                    'setBinding' => [
                        'val' => '70x90/32', 'str' => sprintf('<binding>%s</binding>', '70x90/32')
                    ],
                    'setPageExtent' => [
                        'val' => 288, 'str' => sprintf('<page_extent>%s</page_extent>', 288)
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