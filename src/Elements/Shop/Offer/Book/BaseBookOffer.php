<?php

namespace Rohos\RsYaYml\Elements\Shop\Offer\Book;

use Rohos\RsYaYml\Elements\Shop\Offer\BaseOffer;
use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferDeliverable;
use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferDownloadable;

/**
 * Class BaseBookOffer
 * @package Rohos\RsYaYml\Elements\Shop\Offer\Book
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#concept3__offers
 */
abstract class BaseBookOffer extends BaseOffer
{
    use OfferDeliverable;

    /**
     * Автор произведения
     * @param string $value
     * @return self
     */
    public function setAuthor(string $value): self
    {
        return $this->setElement('author', $this->prepareStr($value));
    }

    /**
     * Название произведения
     * @param string $value
     * @return self
     */
    public function setName(string $value): self
    {
        return $this->setElement('name', $this->prepareStr($value));
    }

    /**
     * Издательство
     * @param string $value
     * @return self
     */
    public function setPublisher(string $value): self
    {
        return $this->setElement('publisher', $this->prepareStr($value));
    }

    /**
     * Код книги, если их несколько, то указываются через запятую. Необязательный элемент
     * @param string $value
     * @return self
     */
    public function setISBN(string $value): self
    {
        return $this->setElement('ISBN', $this->prepareStr($value));
    }

    /**
     * Язык произведения
     * @param string $value
     * @return self
     */
    public function setLanguage(string $value): self
    {
        return $this->setElement('language', $this->prepareStr($value));
    }

    /**
     * Год издания
     * @param int $value
     * @return self
     */
    public function setYear(int $value): self
    {
        return $this->setElement('year', $value);
    }

    /**
     * Количество томов
     * @param int $value
     * @return self
     */
    public function setVolume(int $value): self
    {
        return $this->setElement('volume', $value);
    }

    /**
     * Номер тома
     * @param int $value
     * @return self
     */
    public function setPart(int $value): self
    {
        return $this->setElement('part', $value);
    }

    /**
     * Серия
     * @param string $value
     * @return self
     */
    public function setSeries(string $value): self
    {
        return $this->setElement('series', $this->prepareStr($value));
    }

    /**
     * Элемент предназначен для обозначения товара, который можно скачать.
     * @param bool $value
     * @return self
     */
    public function setDownloadable(bool $value): self
    {
        return $this->setElement('downloadable', $value ? 'true' : 'false');
    }
}
