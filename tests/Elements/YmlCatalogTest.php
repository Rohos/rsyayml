<?php

namespace Rohos\RsYaYml\Tests\Elements;

use PHPUnit\Framework\TestCase;
use Rohos\RsYaYml\Elements\YmlCatalog;

/**
 * Class YmlDocumentTest
 * @package Rohos\RsYaYml\Tests\Elements
 */
class YmlCatalogTest extends TestCase
{
    /** @test */
    public function isCreateNewCorrect(): void
    {
        $ymlDoc = YmlCatalog::createNew();
        $this->assertInstanceOf(YmlCatalog::class, $ymlDoc);
    }

    /** @test */
    public function isBuildElementCorrect(): void
    {
        $ymlDoc = YmlCatalog::createNew();
        $name = 'test-name';
        $data = 'test-data';
        $excepted = sprintf('<%s>%s</%s>', $name, $data, $name);

        $this->assertEquals($excepted, $ymlDoc->buildElement($name, $data));
    }

    /** @test */
    public function isEndOfDocumentCorrect(): void
    {
        $ymlDoc = YmlCatalog::createNew();
        $excepted = sprintf('</%s></%s>', YmlCatalog::SHOP, YmlCatalog::ROOT);

        $this->assertEquals($excepted, $ymlDoc->endOfDocument());
    }
}
