<?php

namespace Rohos\RsYaYml\Elements\Shop\Offer;

use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferDeliverable;

/**
 * Class OfferEventTicket
 * Билеты на мероприятие
 * @package Rohos\RsYaYml\Elements\Shop\Offer
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__event-ticket
 */
class OfferEventTicket extends BaseOffer
{
    use OfferDeliverable;

    /**
     * Название мероприятия
     * @param string $value
     * @return self
     */
    public function setName(string $value): self
    {
        return $this->setElement('name', $this->prepareStr($value));
    }

    /**
     * Зал
     * @param string $value
     * @return self
     */
    public function setPlace(string $value): self
    {
        return $this->setElement('place', $this->prepareStr($value));
    }

    /**
     * Ссылка на изображение с планом зала
     * @param string $value название
     * @param string $plan url плана зала
     * @return self
     */
    public function setHallPlan(string $value, string $plan): self
    {
        $this->elements['hall'] = sprintf('<hall plan="%s">%s</hall>', $plan, $this->prepareStr($value));
        return $this;
    }

    /**
     * Место
     * @param string $value
     * @return self
     */
    public function setHallPart(string $value): self
    {
        return $this->setElement('hall_part', $this->prepareStr($value));
    }

    /**
     * Дата и время сеанса. Указываются в формате ISO 8601: YYYY-MM-DDThh:mm
     * @param string $value
     * @return self
     */
    public function setDate(string $value): self
    {
        return $this->setElement('date', $this->prepareStr($value));
    }

    /**
     * Признак премьерности мероприятия
     * @param bool $value
     * @return self
     */
    public function setIsPremiere(bool $value): self
    {
        return $this->setElement('is_premiere', $value ? 1 : 0);
    }

    /**
     * Признак детского мероприятия
     * @param bool $value
     * @return self
     */
    public function setIsKids(bool $value): self
    {
        return $this->setElement('is_kids', $value ? 1 : 0);
    }

    /**
     * @inheritDoc
     */
    public function getAttrType(): string
    {
        return 'event-ticket';
    }
}
