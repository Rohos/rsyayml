<?php

namespace Rohos\RsYaYml\Elements\Shop;

use Rohos\RsYaYml\Elements\BaseElement;

/**
 * Class Category
 * @package Rohos\RsYaYml\Elements\Shop
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#concept3__categories
 */
class Category extends BaseElement
{
    /** @var string */
    public const PARENT_NAME = 'categories';

    /** @var string */
    private $value;

    /**
     * Category constructor.
     * @param int $id
     * @param string $name
     * @param int $parentId
     */
    public function __construct($id, $name, $parentId = null)
    {
        $this->setAttribute('id', $id);
        $this->value = $this->prepareStr($name);

        if ($parentId) {
            $this->setAttribute('parentId', $parentId);
        }
    }

    /**
     * @inheritdoc
     */
    protected function getValue(): string
    {
        return $this->value;
    }

    /**
     * @inheritdoc
     */
    public function elementName(): string
    {
        return 'category';
    }
}
