<?php

namespace Rohos\RsYaYml\Tests;

use Rohos\RsYaYml\RsYaYml;
use PHPUnit\Framework\TestCase;
use Rohos\RsYaYml\Elements\Shop\Offer\OfferVendorModel;

/**
 * Class RsYaYmlTest
 * @package Rohos\RsYaYml\Tests
 */
class RsYaYmlTest extends TestCase
{
    /**
     * @inheritDoc
     */
    protected function setUp()
    {
        $this->removeYmlFile();
    }

    /**
     * @param OfferVendorModel[] $offers
     * @test
     * @dataProvider dataOffers
     */
    public function isFileCreated(array $offers): void
    {
        $yml = new RsYaYml($this->getFilePath());
        $yml->createBaseShopElements(
            'RsYaYml', 'Rohos', 'https://github.com/Rohos'
        );

        $yml->addCategory(1, 'Yandex');
        $yml->addCategory(2, 'Yml', 1);
        $yml->addCurrency('RUR');

        $yml->createFile();

        foreach ($offers as $offer) {
            $yml->addOffer($offer);
        }

        $yml->saveFile();

        $this->assertFileExists($this->getFilePath());
    }

    /**
     * @return array
     */
    public function dataOffers(): array
    {
        return [
            [
                [
                    (new OfferVendorModel('id-1', true))
                        ->setUrl('/OfferVendorModel')
                        ->setPrice(200)
                        ->setCurrencyId('RUR')
                        ->setCategoryId(1)
                        ->setDescription('Description')
                        ->setModel('Deskjet D2663')
                        ->setTypePrefix('Принтер')
                        ->setSalesNote('Минимум 10')
                        ->setManufacturerWarranty(true)
                        ->setAdult(true)
                        ->setParam('Максимальный формат', 'А4')
                        ->setParam('Количество страниц в месяц', 1000, 'стр')
                        ->setDownloadable(true)
                        ->setCountryOfOrigin('Россия')
                        ->setVendor('Yandex')
                        ->setVendorCode('CH366C')
                        ->setDelivery(true)
                        ->setDeliveryOptions(100)
                ]
            ]
        ];
    }

    /**
     * @return string
     */
    protected function getFilePath(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'dir/test.xml';
    }

    /**
     * @inheritDoc
     */
    protected function tearDown()
    {
        $this->removeYmlFile();
    }

    protected function removeYmlFile(): void
    {
        if (file_exists($this->getFilePath())) {
            unlink($this->getFilePath());
        }
    }
}
