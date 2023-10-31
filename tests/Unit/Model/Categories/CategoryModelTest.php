<?php

use App\Api\CategoryInterface;
use App\Model\Categories\CategoryModel;
use App\Model\Product;
use PHPUnit\Framework\TestCase;

/**
 * @covers  CategoryModel
 */
final class CategoryModelTest extends TestCase
{
    public CategoryInterface $categoryModel;

    public Product $product1;

    public Product $product2;

    protected function setUp(): void
    {
        $this->categoryModel = new class extends CategoryModel implements CategoryInterface {
        };
        $this->product1 = new Product('test1', 100);
        $this->product2 = new Product('test2', 200);
    }

    public function testAddAndGetProducts(): void
    {
        $this->categoryModel
             ->addProduct($this->product1)
             ->addProduct($this->product2);
        
        $this->assertEquals($this->product1, $this->categoryModel->getProducts()[0]);
        $this->assertEquals($this->product2, $this->categoryModel->getProducts()[1]);
    }
}
