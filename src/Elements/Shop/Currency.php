<?php

namespace Rohos\RsYaYml\Elements\Shop;

use Rohos\RsYaYml\Elements\BaseElement;

/**
 * Class Currency
 * @package Rohos\RsYaYml\Elements\Shop
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#concept3__currencies
 */
class Currency extends BaseElement
{
    /** @var string */
    public const ID_RUR = 'RUR';

    /** @var string */
    public const ID_UAH = 'UAH';

    /** @var string */
    public const ID_BYN = 'BYN';

    /** @var string */
    public const ID_KZT = 'KZT';

    /** @var string */
    public const ID_USD = 'USD';

    /** @var string */
    public const ID_EUR = 'EUR';

    /** @var int */
    public const RATE_GENERAL = 1;

    /** @var string */
    public const RATE_CBRF = 'CBRF'; // курс по Центральному банку РФ

    /** @var string */
    public const RATE_NBU = 'NBU'; // курс по Национальному банку Украины

    /** @var string */
    public const RATE_NBK = 'NBK'; // курс по Национальному банку Казахстана

    /** @var string */
    public const RATE_СВ = 'СВ'; // курс по банку той страны, к которой относится магазин по своему региону, указанному в личном кабинете

    /** @var string */
    public const PARENT_NAME = 'currencies';

    /** @var bool */
    protected $isOneOperator = true;

    /**
     * Currency constructor.
     * @param string $id
     * @param int|string $rate В качестве разделителя целой и дробной частей спользуется точка
     */
    public function __construct($id, $rate = 1)
    {
        $this->setAttribute('id', $id);

        if (!is_null($rate)) {
            $this->setAttribute('rate', $rate);
        }
    }

    /**
     * @inheritdoc
     */
    public function elementName(): string
    {
        return 'currency';
    }
}
