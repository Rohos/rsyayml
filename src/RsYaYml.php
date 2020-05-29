<?php

namespace Rohos\RsYaYml;

use Rohos\RsYaYml\Elements\YmlCatalog;
use Rohos\RsYaYml\Elements\Shop\Offer\BaseOffer;

/**
 * Class RsYaYml
 * @package Rohos\RsYaYml
 */
class RsYaYml
{
    /** @var YmlCatalog */
    private $ymlCatalog;

    /** @var string */
    private $filePath;

    /** @var int */
    private $maxChunkSize;

    /**
     * RsYaYml constructor.
     * @param string $filePath
     * @param int $maxChunkSize
     */
    public function __construct(string $filePath, int $maxChunkSize = 300)
    {
        $this->ymlCatalog = YmlCatalog::createNew();
        $this->filePath = $filePath;
        $this->maxChunkSize = $maxChunkSize;
    }

    /**
     * @param string $name
     * @param string $company
     * @param string $url
     */
    public function createBaseShopElements($name, $company, $url): void
    {
        $this->ymlCatalog->createBaseShopElements($name, $company, $url);
    }

    /**
     * @param int $id
     * @param string $name
     * @param int $parentId
     */
    public function addCategory($id, $name, $parentId = null): void
    {
        $this->ymlCatalog->addCategory($id, $name, $parentId);
    }

    /**
     * @param string $id
     * @param int|string $rate В качестве разделителя целой и дробной частей спользуется точка
     */
    public function addCurrency($id, $rate = null): void
    {
        $this->ymlCatalog->addCurrency($id, $rate);
    }

    /**
     * @param BaseOffer $offer
     */
    public function addOffer(BaseOffer $offer): void
    {
        if ($this->ymlCatalog->countOffers() >= $this->maxChunkSize) {
            $resource = $this->putOffersAtFile();
            fclose($resource);

            $this->ymlCatalog->clearOffers();
        }

        $this->ymlCatalog->addOffer($offer);
    }

    /**
     * @return resource
     */
    protected function putOffersAtFile()
    {
        $resource = fopen($this->filePath, 'a');

        foreach ($this->ymlCatalog->getOffers() as $offer) {
            fwrite($resource, $offer);
        }

        return $resource;
    }

    /**
     * Create file
     */
    public function createFile(): void
    {
        $begin = str_replace($this->ymlCatalog->endOfDocument(), '', $this->ymlCatalog->saveXML());

        file_put_contents(
            $this->filePath,
            "\xEF\xBB\xBF" . $begin . $this->ymlCatalog->buildBeginOfShop()
        );
    }

    /**
     * Finish save file
     */
    public function saveFile(): void
    {
        $resource = $this->putOffersAtFile(true);

        fwrite($resource, '</' . BaseOffer::PARENT_NAME .'>' . $this->ymlCatalog->endOfDocument());
        fclose($resource);

        $this->ymlCatalog->clearOffers();
    }
}