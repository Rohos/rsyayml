<?php

namespace Rohos\RsYaYml\Elements\Shop\Offer;

use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferAdultable;
use Rohos\RsYaYml\Elements\Shop\Offer\ArtistTitle\BaseArtistTitle;

/**
 * Class OfferArtistTitleVideo
 * Видео продукция
 * @package Rohos\RsYaYml\Elements\Shop\Offer
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__artist-title
 */
class OfferArtistTitleVideo extends BaseArtistTitle
{
    use OfferAdultable;

    /**
     * Актеры (Тони Колетт (Toni Collette), Рэйчел Грифитс (Rachel Griffiths))
     * @param string $value
     * @return self
     */
    public function setStarring(string $value): self
    {
        return $this->setElement('starring', $this->prepareStr($value));
    }

    /**
     * Режиссер (П Дж Хоген)
     * @param string $value
     * @return self
     */
    public function setDirector(string $value): self
    {
        return $this->setElement('director', $this->prepareStr($value));
    }

    /**
     * Оригинальное название
     * @param string $value
     * @return self
     */
    public function setOriginalName(string $value): self
    {
        return $this->setElement('originalName', $this->prepareStr($value));
    }

    /**
     * Оригинальное название
     * @param string $value
     * @return self
     */
    public function setCountry(string $value): self
    {
        return $this->setElement('country', $this->prepareStr($value));
    }
}
