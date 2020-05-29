<?php

namespace Rohos\RsYaYml\Elements\Shop\Offer;

use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferAdultable;
use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferVendorable;
use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferDeliverable;
use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferDownloadable;
use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferCountryOfOriginable;

/**
 * Class OfferVendorModel
 * Произвольный товар. Этот тип описания является наиболее удобным и универсальным, он рекомендован для описания товаров из большинства категорий.
 * @package Rohos\RsYaYml\Elements\Shop\Offer
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__vendor-model
 */
class OfferVendorModel extends BaseOffer
{
    use OfferDeliverable,
        OfferVendorable,
        OfferAdultable,
        OfferCountryOfOriginable;

    /**
     * Название модели должно содержать цифры и буквы.
     * @param string $value
     * @return self
     */
    public function setModel(string $value): self
    {
        return $this->setElement('model', $this->prepareStr($value));
    }

    /**
     * @param mixed $value
     * @return self
     */
    public function setTypePrefix($value): self
    {
        return $this->setElement('typePrefix', $value);
    }

    /**
     * Элемент используется для отражения информации о минимальной сумме заказа, минимальной партии товара или
     * необходимости предоплаты, а так же для описания акций магазина. Допустимая длина текста в элементе — 50 символов.
     * @param string $value
     * @return self
     */
    public function setSalesNote(string $value): self
    {
        return $this->setElement('sales_notes', $value);
    }

    /**
     * Элемент предназначен для отметки товаров, имеющих официальную гарантию производителя.
     * @param bool $value
     * @return self
     */
    public function setManufacturerWarranty(bool $value): self
    {
        return $this->setElement('manufacturer_warranty', $this->boolToStr($value));
    }

    /**
     * Элемент предназначен для указания характеристик товара. Для описания каждого параметра используется отдельный элемент <param>
     * @param string $name
     * @param mixed $value
     * @param string $unit
     * @return self
     */
    public function setParam(string $name, $value, string $unit = null): self
    {
        $elemName = 'param';
        $beginElement = sprintf('<%s name="%s"', $elemName, $name);

        if (!empty($unit)) {
            $beginElement .= sprintf(' unit="%s"', $unit);
        }

        if (empty($this->elements['param'])) {
            $this->elements['param'] = [];
        }

        $this->elements['param'][] = sprintf('%s>%s</%s>', $beginElement, $this->prepareStr($value), $elemName);
        return $this;
    }

    /**
     * Элемент предназначен для обозначения товара, который можно скачать.
     * @param bool $value
     * @return self
     */
    public function setDownloadable(bool $value): self
    {
        return $this->setElement('downloadable', $this->boolToStr($value));
    }

    /**
     * @inheritDoc
     */
    public function getAttrType(): string
    {
        return 'vendor.model';
    }
}
