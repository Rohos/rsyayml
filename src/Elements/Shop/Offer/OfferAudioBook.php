<?php

namespace Rohos\RsYaYml\Elements\Shop\Offer;

use Rohos\RsYaYml\Elements\Shop\Offer\Book\BaseBookOffer;

/**
 * Class OfferAudioBook
 * Аудиокниги
 * @package Rohos\RsYaYml\Elements\Shop\Offer
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__audiobook
 */
class OfferAudioBook extends BaseBookOffer
{
    /**
     * Исполнитель. Если их несколько, перечисляются через запятую
     * @param string $value
     * @return self
     */
    public function setPerformedBy(string $value): self
    {
        return $this->setElement('performed_by', $this->prepareStr($value));
    }

    /**
     * Тип аудиокниги (радиоспектакль, произведение начитано, ...)
     * @param string $value
     * @return self
     */
    public function setPerformanceType(string $value): self
    {
        return $this->setElement('performance_type', $this->prepareStr($value));
    }

    /**
     * Носитель, на котором поставляется аудиокнига.
     * @param string $value
     * @return self
     */
    public function setStorage(string $value): self
    {
        return $this->setElement('storage', $this->prepareStr($value));
    }

    /**
     * Формат аудиокниги
     * @param string $value
     * @return self
     */
    public function setFormat(string $value): self
    {
        return $this->setElement('format', $this->prepareStr($value));
    }

    /**
     * Время звучания задается в формате mm.ss (минуты.секунды) - 45m23s
     * @param string $value
     * @return self
     */
    public function setRecordingLength(string $value): self
    {
        return $this->setElement('recording_length', $this->prepareStr($value));
    }

    /**
     * @inheritDoc
     */
    public function getAttrType(): string
    {
        return 'audiobook';
    }
}
