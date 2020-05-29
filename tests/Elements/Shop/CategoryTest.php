<?php

namespace Rohos\RsYaYml\Tests\Elements\Shop;

use PHPUnit\Framework\TestCase;
use Rohos\RsYaYml\Elements\Shop\Category;

/**
 * Class CategoryTest
 * @package Rohos\RsYaYml\Tests\Elements\Shop
 */
class CategoryTest extends TestCase
{
    /**
     * @param $id
     * @param $name
     * @param $excepted
     * @param $isEquals
     *
     * @test
     * @dataProvider dataForTwoParams
     */
    public function isCrearedCorrectXmlWithTwoParams($id, $name, $excepted, $isEquals): void
    {
        $category = new Category($id, $name);

        if ($isEquals) {
            $this->assertEquals($excepted, $category->getXml());
        } else {
            $this->assertNotEquals($excepted, $category->getXml());
        }
    }

    /**
     * @param $id
     * @param $parentId
     * @param $name
     * @param $excepted
     * @param $isEquals
     *
     * @test
     * @dataProvider dataForThreeParams
     */
    public function isCrearedCorrectXmlWithThreeParams($id, $parentId, $name, $excepted, $isEquals): void
    {
        $category = new Category($id, $name, $parentId);

        if ($isEquals) {
            $this->assertEquals($excepted, $category->getXml());
        } else {
            $this->assertNotEquals($excepted, $category->getXml());
        }
    }

    /** @test */
    public function isCorrectElementName(): void
    {
        $category = new Category('id', 'name');
        $this->assertEquals('category', $category->elementName());
    }

    /**
     * @return array
     */
    public function dataForTwoParams(): array
    {
        $tpl = '<category id="%s">%s</category>';
        $id = 'id-test-2';
        $name = 'category-test-2';
        $exceptedTrue = sprintf($tpl, $id, $name);
        $exceptedFalse = sprintf($tpl, 'test-1', 'test-1');

        return [
            [$id, $name, $exceptedTrue, true],
            [$id, $name, $exceptedFalse, false],
        ];
    }

    /**
     * @return array
     */
    public function dataForThreeParams(): array
    {
        $tpl = '<category id="%s" parentId="%s">%s</category>';
        $id = 'id-test-2';
        $name = 'category-test-2';
        $parentId = 'parentId-test-3';
        $exceptedTrue = sprintf($tpl, $id, $parentId, $name);
        $exceptedFalse = sprintf($tpl, 'test-1', 'test-1', 'test-1');

        return [
            [$id, $parentId, $name, $exceptedTrue, true],
            [$id, $parentId, $name, $exceptedFalse, false],
        ];
    }
}