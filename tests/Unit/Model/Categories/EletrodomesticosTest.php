<?php

use App\Api\CategoryInterface;
use App\Model\Categories\Eletrodomesticos;
use PHPUnit\Framework\TestCase;

/**
 * @covers  Eletrodomesticos
 */
final class EletrodomesticosTest extends TestCase
{
    public CategoryInterface $category;

    protected function setUp(): void
    {
        $this->category = new Eletrodomesticos;
    }

    public function testGetName(): void
    {
        $this->assertEquals('Eletrodomésticos', $this->category->getName());
    }

    public function testGetTax(): void
    {
        $this->assertEquals(0.1, $this->category->getTax());
    }
}
