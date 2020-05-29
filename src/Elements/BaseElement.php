<?php

namespace Rohos\RsYaYml\Elements;

/**
 * Class BaseElement
 * @package Rohos\RsYaYml\Elements
 */
abstract class BaseElement
{
    /** @var array  */
    protected $attributes = [];

    /** @var array  */
    protected $elements = [];

    /** @var bool */
    protected $isOneOperator = false;

    /**
     * @return string
     */
    abstract public function elementName(): string;

    /**
     * @return string
     */
    public function getXml(): string
    {
        if ($this->isOneOperator) {
            return '<'. $this->elementName() . $this->prepareAttributes() .'/>';
        }

        return '<'. $this->elementName() . $this->prepareAttributes() .'>'
            . $this->getValue()
            . '</'. $this->elementName() .'>';
    }

    /**
     * @return string
     */
    protected function prepareAttributes(): string
    {
        $attributes = [];

        foreach ($this->attributes as $name => $value) {
            if (!is_null($value)) {
                $attributes[] = ' '. $name .'="'. $value .'"';
            }
        }

        return implode('', $attributes);
    }

    /**
     * @return string
     */
    protected function getValue(): string
    {
        return $this->prepareElements();
    }

    /**
     * @return string
     */
    protected function prepareElements(): string
    {
        $elements = [];

        foreach ($this->elements as $name => $value) {
            if (is_null($value)) {
                continue;
            }

            if (is_array($value)) {
                foreach ($value as $val) {
                    $elements[] = $val;
                }
            } else {
                $elements[] = '<'. $name .'>'. $value .'</'. $name .'>';
            }
        }

        return implode('', $elements);
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    protected function setElement($name, $value): self
    {
        $this->elements[$name] = $value;
        return $this;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    protected function setAttribute($name, $value): void
    {
        $this->attributes[$name] = $value;
    }

    /**
     * @param bool $value
     * @return string
     */
    protected function boolToStr(bool $value): string
    {
        return $value ? 'true' : 'false';
    }

    /**
     * @param string $value
     * @return string
     */
    protected function convertToCdata(string $value): string
    {
        return '<![CDATA[' . $value . ']]>';
    }

    /**
     * @param string $str
     * @return string
     */
    public function prepareStr($str): string
    {
        return str_replace(
            ['&', '<', '>', '"', "'"],
            ["&amp;", "&lt;", "&gt;", "&quot;", "&apos;"],
            $str
        );
    }
}