<?php

namespace Rohos\RsYaYml\Elements\Shop\Offer\Traits;

/**
 * Trait OfferCountryOfOriginable
 * @package Rohos\RsYaYml\Elements\Shop\Offer\Traits
 */
trait OfferCountryOfOriginable
{
    /**
     * Элемент предназначен для указания страны производства товара.
     * Список стран, которые могут быть указаны в этом элементе:
     * @see http://partnermarket/elements//pages/help/Countries.pdf
     * @TODO добавить списки городов
     * @param string $value
     * @return self
     */
    public function setCountryOfOrigin(string $value): self
    {
        return $this->setElement('country_of_origin', $value);
    }
}
