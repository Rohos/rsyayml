<?php

namespace Rohos\RsYaYml\Elements\Shop\Offer;

use Rohos\RsYaYml\Elements\BaseElement;

/**
 * Class BaseOffer
 * @package Rohos\RsYaYml\Elements\Shop\Offer
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#concept3__offers
 */
abstract class BaseOffer extends BaseElement
{
    /** @var string */
    public const PARENT_NAME = 'offers';

    /**
     * Offer constructor.
     * @param mixed $id
     * @param bool $available
     */
    public function __construct($id, bool $available)
    {
        $this->setAttribute('id', $id);
        $this->setAttribute('available', $this->boolToStr($available));

        if (!empty($this->getAttrType())) {
            $this->setAttribute('type', $this->getAttrType());
        }
    }

    /**
     * URL страницы товара. Максимальная длина URL — 512 символов.
     * @param string $value
     * @return self
     */
    public function setUrl(string $value): self
    {
        return $this->setElement('url', $value);
    }

    /**
     * Цена, по которой данный товар можно приобрести. Цена товарного предложения округляется, формат,
     * в котором она отображается, зависит от настроек пользователя.
     * Указанное значение не должно быть равно нулю.
     * @param float $value
     * @return self
     */
    public function setPrice(float $value): self
    {
        return $this->setElement('price', $value);
    }

    /**
     * Идентификатор валюты товара (RUR, USD, UAH, KZT). Для корректного отображения цены в национальной
     * валюте необходимо использовать идентификатор (например, UAH) с соответствующим значением цены.
     * @param string $value
     * @return self
     */
    public function setCurrencyId(string $value): self
    {
        return $this->setElement('currencyId', $value);
    }

    /**
     * Идентификатор категории товара (целое число не более 18 знаков). Товарное предложение может принадлежать только одной категории.
     * @param int $value
     * @return self
     */
    public function setCategoryId(int $value): self
    {
        return $this->setElement('categoryId', $value);
    }

    /**
     * Описание используется для замены в результатах поиска текста сниппета, собранного автоматически со
     * страницы сайта. Замена производится только в случаях, когда автоматически собранный текст плохого качества.
     * Максимальная длина — 175 символов.
     * @param string $value
     * @return self
     */
    public function setDescription(string $value): self
    {
        if (!empty($value)) {
            return $this->setElement('description', $this->convertToCdata($value));
        }

        return $this;
    }

    /**
     * @param mixed $value
     * @return self
     */
    public function setPicture($value): self
    {
        return $this->setElement('picture', $value);
    }

    /**
     * @param bool $value
     * @return self
     */
    public function setStore($value): self
    {
        return $this->setElement('store', $this->boolToStr($value));
    }

    /**
     * @inheritdoc
     */
    public function elementName(): string
    {
        return 'offer';
    }

    /**
     * @return string
     */
    abstract public function getAttrType(): string;
}
