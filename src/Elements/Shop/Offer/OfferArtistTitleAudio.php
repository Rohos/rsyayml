<?php

namespace Rohos\RsYaYml\Elements\Shop\Offer;

use Rohos\RsYaYml\Elements\Shop\Offer\ArtistTitle\BaseArtistTitle;

/**
 * Class OfferArtistTitleAudio
 * Музыкальная продукция
 * @package Rohos\RsYaYml\Elements\Shop\Offer
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__artist-title
 */
class OfferArtistTitleAudio extends BaseArtistTitle
{
    /**
     * Исполнитель
     * @param string $value
     * @return self
     */
    public function setArtist(string $value): self
    {
        return $this->setElement('artist', $this->prepareStr($value));
    }
}
