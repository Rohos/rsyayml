<?php

namespace Rohos\RsYaYml\Elements;

use DOMElement;
use DomDocument;
use Rohos\RsYaYml\Elements\Shop\Category;
use Rohos\RsYaYml\Elements\Shop\Currency;
use Rohos\RsYaYml\Elements\Shop\Offer\BaseOffer;

/**
 * Class YmlDocument
 * @package Rohos\RsYaYml\Elements
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#concept3__yml-catalog
 */
class YmlCatalog extends DomDocument
{
    /** @var string */
    public const VERSION = '1.0';

    /** @var string */
    public const ENCODING = 'UTF-8';

    /** @var string */
    public const ROOT = 'yml_catalog';

    /** @var string */
    public const SHOP = 'shop';

    /** @var string */
    public const ROOT_DATE_ATTR_FORMAT = 'Y-m-d H:i';

    /** @var DOMElement */
    private $root;

    /** @var DOMElement */
    private $shop;

    /** @var array  */
    private $currencies = [];

    /** @var array  */
    private $categories = [];

    /** @var array  */
    private $offers = [];

    /**
     * @param string $encoding
     * @return static
     */
    public static function createNew($encoding = self::ENCODING): self
    {
        return new self(self::VERSION, $encoding);
    }

    /**
     * @inheritdoc
     */
    public function __construct($version, $encoding)
    {
        parent::__construct($version, $encoding);

        $this->createBaseElements();
    }

    /**
     * @param string $name
     * @param string $company
     * @param string $url
     */
    public function createBaseShopElements($name, $company, $url): void
    {
        $this->appendChildToShop('name', $name)
            ->appendChildToShop('company', $company)
            ->appendChildToShop('url', $url);
    }

    /**
     * Create base elements
     */
    protected function createBaseElements(): void
    {
        $this->root = $this->createElement(self::ROOT);
        $this->shop = $this->createElement(self::SHOP);

        $this->root->setAttribute('date', date(self::ROOT_DATE_ATTR_FORMAT));
        $this->root->appendChild($this->shop);
        $this->appendChild($this->root);
    }

    /**
     * @param string $name
     * @param null $value
     * @return $this
     */
    protected function appendChildToShop($name, $value = null): self
    {
        $this->shop->appendChild($this->createElement($name, $value));
        return $this;
    }

    /**
     * @param int $id
     * @param string $name
     * @param int $parentId
     */
    public function addCategory($id, $name, $parentId = null): void
    {
        $this->categories[$id] = (new Category($id, $name, $parentId))->getXml();
    }

    /**
     * @param string $id
     * @param int|string $rate В качестве разделителя целой и дробной частей спользуется точка
     */
    public function addCurrency($id, $rate = null): void
    {
        $this->currencies[$id] = (new Currency($id, $rate))->getXml();
    }

    /**
     * @param BaseOffer $offer
     */
    public function addOffer(BaseOffer $offer): void
    {
        $this->offers[] = $offer->getXml();
    }

    /**
     * @return array
     */
    public function getOffers(): array
    {
        return $this->offers;
    }

    /**
     * Clear offers
     */
    public function clearOffers(): void
    {
        $this->offers = [];
    }

    /**
     * @return int
     */
    public function countOffers(): int
    {
        return count($this->offers);
    }

    /**
     * @return string
     */
    protected function prepareCategories(): string
    {
        if (!empty($this->categories)) {
            return $this->buildElement(Category::PARENT_NAME, implode('', $this->categories));
        }

        return '';
    }

    /**
     * @return string
     */
    protected function prepareCurrencies(): string
    {
        if (!empty($this->currencies)) {
            return $this->buildElement(Currency::PARENT_NAME, implode('', $this->currencies));
        }

        return '';
    }

    /**
     * @return string
     */
    public function buildBeginOfShop(): string
    {
        $str = $this->prepareCategories() . $this->prepareCurrencies() . '<' . BaseOffer::PARENT_NAME .'>';

        $this->categories = [];
        $this->currencies = [];

        return $str;
    }

    /**
     * @param string $name
     * @param string $data
     * @return string
     */
    public function buildElement($name, $data): string
    {
        return sprintf('<%s>%s</%s>', $name, $data, $name);
    }

    /**
     * @return string
     */
    public function endOfDocument(): string
    {
        return sprintf('</%s></%s>', self::SHOP, self::ROOT);
    }
}
