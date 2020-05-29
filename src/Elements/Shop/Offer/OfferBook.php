<?php

namespace Rohos\RsYaYml\Elements\Shop\Offer;

use Rohos\RsYaYml\Elements\Shop\Offer\Book\BaseBookOffer;

/**
 * Class OfferBook
 * Книги
 * @package Rohos\RsYaYml\Elements\Shop\Offer
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__book
 */
class OfferBook extends BaseBookOffer
{
    /**
     * Переплет
     * @param string $value
     * @return self
     */
    public function setBinding(string $value): self
    {
        return $this->setElement('binding', $this->prepareStr($value));
    }

    /**
     * Количество страниц в книге, должно быть целым положительным числом
     * @param int $value
     * @return self
     */
    public function setPageExtent(int $value): self
    {
        return $this->setElement('page_extent', $value);
    }

    /**
     * @inheritDoc
     */
    public function getAttrType(): string
    {
        return 'book';
    }
}
