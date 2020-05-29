<?php

namespace Rohos\RsYaYml\Elements\Shop\Offer;

use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferAdultable;
use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferVendorable;
use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferDeliverable;
use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferCountryOfOriginable;

/**
 * Class OfferSimple
 * Упрощенное описание. Это базовый, наиболее простой тип описания
 * @package Rohos\RsYaYml\Elements\Shop\Offer
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__base
 */
class OfferSimple extends BaseOffer
{
    use OfferDeliverable,
        OfferVendorable,
        OfferAdultable,
        OfferCountryOfOriginable;

    /**
     * Название товарного предложения
     * @param string $value
     * @return self
     */
    public function setName(string $value): self
    {
        return $this->setElement('name', $this->prepareStr($value));
    }

    /**
     * @inheritDoc
     */
    public function getAttrType(): string
    {
        return '';
    }
}
