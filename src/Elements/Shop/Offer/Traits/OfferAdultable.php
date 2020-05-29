<?php

namespace Rohos\RsYaYml\Elements\Shop\Offer\Traits;

/**
 * Trait OfferAdultable
 * @package Rohos\RsYaYml\Elements\Shop\Offer\Traits
 */
trait OfferAdultable
{

    /**
     * Элемент обязателен для обозначения товара, имеющего отношение к удовлетворению сексуальных потребностей,
     * либо иным образом эксплуатирующего интерес к сексу.
     * @param bool $value
     * @return self
     */
    public function setAdult(bool $value): self
    {
        return $this->setElement('adult', $this->boolToStr($value));
    }
}
