<?php

namespace Rohos\RsYaYml\Elements\Shop\Offer\ArtistTitle;

use Rohos\RsYaYml\Elements\Shop\Offer\BaseOffer;
use Rohos\RsYaYml\Elements\Shop\Offer\Traits\OfferDeliverable;

/**
 * Class BaseArtistTitle
 * Музыкальная и видео продукция
 * @package Rohos\RsYaYml\Elements\Shop\Offer\ArtistTitle
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__artist-title
 */
abstract class BaseArtistTitle extends BaseOffer
{
    use OfferDeliverable;

    /**
     * @inheritDoc
     */
    public function getAttrType(): string
    {
        return 'artist.title';
    }

    /**
     * Название
     * @param string $value
     * @return self
     */
    public function setTitle(string $value): self
    {
        return $this->setElement('title', $this->prepareStr($value));
    }

    /**
     * Год выпуска
     * @param int $value
     * @return self
     */
    public function setYear(int $value): self
    {
        return $this->setElement('year', $value);
    }

    /**
     * Носитель
     * @param string $value
     * @return self
     */
    public function setMedia(string $value): self
    {
        return $this->setElement('media', $this->prepareStr($value));
    }
}