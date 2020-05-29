<?php

namespace Rohos\RsYaYml\Elements\Shop\Offer;

use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferVendorable;
use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferDeliverable;
use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferCountryOfOriginable;

/**
 * Class OfferTour
 * Туры
 * @package Rohos\RsYaYml\Elements\Shop\Offer
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__tour
 */
class OfferTour extends BaseOffer
{
    use OfferDeliverable;

    /**
     * Часть света
     * @param string $value
     * @return self
     */
    public function setWorldRegion(string $value): self
    {
        return $this->setElement('worldRegion', $this->prepareStr($value));
    }

    /**
     * Страна
     * @param string $value
     * @return self
     */
    public function setCountry(string $value): self
    {
        return $this->setElement('country', $this->prepareStr($value));
    }

    /**
     * Курорт или город
     * @param string $value
     * @return self
     */
    public function setRegion(string $value): self
    {
        return $this->setElement('region', $this->prepareStr($value));
    }

    /**
     * Количество дней тура
     * @param int $value
     * @return self
     */
    public function setDays(int $value): self
    {
        return $this->setElement('days', $value);
    }

    /**
     * Даты заездов
     * @param string $value
     * @return self
     */
    public function setDataTour(string $value): self
    {
        return $this->setElement('dataTour', $this->prepareStr($value));
    }

    /**
     * Название отеля (в некоторых случаях название тура)
     * @param string $value
     * @return self
     */
    public function setName(string $value): self
    {
        return $this->setElement('name', $this->prepareStr($value));
    }

    /**
     * Звезды отеля (5*****)
     * @param string $value
     * @return self
     */
    public function setHotelStars(string $value): self
    {
        return $this->setElement('hotel_stars', $this->prepareStr($value));
    }

    /**
     * Тип комнаты (SNG, DBL, ...)
     * @param string $value
     * @return self
     */
    public function setRoom(string $value): self
    {
        return $this->setElement('room', $this->prepareStr($value));
    }

    /**
     * Тип питания (All, HB, ...)
     * @param string $value
     * @return self
     */
    public function setMeal(string $value): self
    {
        return $this->setElement('meal', $this->prepareStr($value));
    }

    /**
     * Что включено в стоимость тура (авиаперелет, трансфер, проживание, питание, страховка, ...)
     * @param string $value
     * @return self
     */
    public function setIncluded(string $value): self
    {
        return $this->setElement('included', $this->prepareStr($value));
    }

    /**
     * Транспорт (Авиа, ...)
     * @param string $value
     * @return self
     */
    public function setTransport(string $value): self
    {
        return $this->setElement('transport', $this->prepareStr($value));
    }

    /**
     * @inheritDoc
     */
    public function getAttrType(): string
    {
        return 'tour';
    }
}
