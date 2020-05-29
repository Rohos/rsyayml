<?php

namespace Rohos\RsYaYml\Tests\Elements\Shop;

use PHPUnit\Framework\TestCase;
use Rohos\RsYaYml\Elements\Shop\Offer\OfferEventTicket;

/**
 * Class OfferEventTicketTest
 * @package Rohos\RsYaYml\Tests\Elements\Shop
 */
class OfferEventTicketTest extends TestCase
{
    /**
     * @param mixed $id
     * @param bool $available
     * @test
     * @dataProvider dataForAttributes
     */
    public function isCorrectAttributes($id, $available): void
    {
        $offer = new OfferEventTicket($id, $available);
        $xml = $offer->getXml();
        $type = 'event-ticket';

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
        $offer = new OfferEventTicket('id-2', true);

        foreach ($data as $method => $item) {
            if (is_array($item['val'])) {
                $offer->{$method}(...$item['val']);
            } else {
                $offer->{$method}($item['val']);
            }
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
                    'setName' => [
                        'val' => 'Пиковая дама', 'str' => sprintf('<name>%s</name>', 'Пиковая дама')
                    ],
                    'setPlace' => [
                        'val' => 'Дом музыки', 'str' => sprintf('<place>%s</place>', 'Дом музыки')
                    ],
                    'setHallPlan' => [
                        'val' => ['Дом музыки', '/hall'], 'str' => sprintf('<hall plan="%s">%s</hall>', '/hall', 'Дом музыки')
                    ],
                    'setHallPart' => [
                        'val' => 'Партер р. 1-5', 'str' => sprintf('<hall_part>%s</hall_part>', 'Партер р. 1-5')
                    ],
                    'setDate' => [
                        'val' => '2009-12-31T19:00', 'str' => sprintf('<date>%s</date>', '2009-12-31T19:00')
                    ],
                    'setIsPremiere' => [
                        'val' => true, 'str' => sprintf('<is_premiere>%s</is_premiere>', '1')
                    ],
                    'setIsKids' => [
                        'val' => false, 'str' => sprintf('<is_kids>%s</is_kids>', '0')
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