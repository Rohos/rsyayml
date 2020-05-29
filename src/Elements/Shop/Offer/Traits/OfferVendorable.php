<?php

namespace Rohos\RsYaYml\Elements\Shop\Offer\Traits;

/**
 * Trait OfferVendorable
 * @package Rohos\RsYaYml\Elements\Shop\Offer\Traits
 */
trait OfferVendorable
{
    /**
     * В элементе vendor указывается производитель товара или его торговая марка
     * @param string $value
     * @return self
     */
    public function setVendor(string $value): self
    {
        return $this->setElement('vendor', $value);
    }

    /**
     * Код товара (указывается код производителя)
     * @param string $value
     * @return self
     */
    public function setVendorCode(string $value): self
    {
        return $this->setElement('vendorCode', $value);
    }
}
