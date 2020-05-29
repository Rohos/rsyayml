<?php

namespace Rohos\RsYaYml\Tests\Elements\Shop;

use PHPUnit\Framework\TestCase;
use Rohos\RsYaYml\Elements\Shop\Offer\OfferArtistTitleVideo;

/**
 * Class OfferArtistTitleVideoTest
 * @package Rohos\RsYaYml\Tests\Elements\Shop
 */
class OfferArtistTitleVideoTest extends TestCase
{
    /**
     * @param mixed $id
     * @param bool $available
     * @test
     * @dataProvider dataForAttributes
     */
    public function isCorrectAttributes($id, $available): void
    {
        $offer = new OfferArtistTitleVideo($id, $available);
        $xml = $offer->getXml();
        $type = 'artist.title';

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
        $offer = new OfferArtistTitleVideo('id-2', true);

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
                    'setTitle' => [
                        'val' => 'Dark Side Of The Moon', 'str' => sprintf('<title>%s</title>', 'Dark Side Of The Moon')
                    ],
                    'setYear' => [
                        'val' => 1999, 'str' => sprintf('<year>%s</year>', 1999)
                    ],
                    'setMedia' => [
                        'val' => 'CD', 'str' => sprintf('<media>%s</media>', 'CD')
                    ],
                    'setStarring' => [
                        'val' => 'Тони Колетт (Toni Collette), Рэйчел Грифитс (Rachel Griffiths)', 'str' => sprintf('<starring>%s</starring>', 'Тони Колетт (Toni Collette), Рэйчел Грифитс (Rachel Griffiths)')
                    ],
                    'setDirector' => [
                        'val' => 'П Дж Хоген', 'str' => sprintf('<director>%s</director>', 'П Дж Хоген')
                    ],
                    'setOriginalName' => [
                        'val' => 'Gothic', 'str' => sprintf('<originalName>%s</originalName>', 'Gothic')
                    ],
                    'setCountry' => [
                        'val' => 'Австралия', 'str' => sprintf('<country>%s</country>', 'Австралия')
                    ],
                    'setAdult' => [
                        'val' => true, 'str' => sprintf('<adult>%s</adult>', $this->boolToStr(true))
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