<?php

namespace Rohos\RsYaYml\Elements\Shop\Offer\Traits;

/**
 * Trait OfferDeliverable
 * @package Rohos\RsYaYml\Elements\Shop\Offer\Traits
 */
trait OfferDeliverable
{
    /**
     * Элемент, отражающий возможность доставки соответствующего товара.
     * «false» — товар не может быть доставлен («самовывоз»).
     * «true» — доставка товара осуществлятся в регионы, указанные во вкладке Магазин в разделе Товары и цены Яндекс.Вебмастера.
     * @param bool $value
     * @return self
     */
    public function setDelivery(bool $value): self
    {
        return $this->setElement('delivery', $value ? 'true' : 'false');
    }

    /**
     * Стоимость доставки данного товара в своем регионе.
     * @param mixed $value
     * @return self
     */
    public function setDeliveryOptions($value): self
    {
        return $this->setElement('delivery-options', $value);
    }
}
