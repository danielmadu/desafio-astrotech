<?php

use App\Api\CategoryInterface;
use App\Model\Categories\Notebooks;
use App\Model\Categories\SmartPhones;
use App\Model\Product;
use PHPUnit\Framework\TestCase;

/**
 * @covers Product
 */
final class ProductTest extends TestCase
{
    public Product $product;

    public CategoryInterface $category;

    protected function setUp(): void
    {
        $this->product  = new Product('test', 100);
        $this->category = new Notebooks;
    }

    public function testGetName(): void
    {
        $this->assertEquals('test', $this->product->getName());
    }

    public function testPrice()
    {
        $this->assertEquals(100, $this->product->getPrice());
    }

    public function testGetCategory(): void
    {
        $this->category->addProduct($this->product);
        $this->assertInstanceOf(Notebooks::class, $this->product->getCategory());
    }

    public function testSetCategory(): void
    {
        $this->product->setCategory(new SmartPhones);
        $this->assertInstanceOf(SmartPhones::class, $this->product->getCategory());
    }
}
