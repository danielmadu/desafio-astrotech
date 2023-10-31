<?php

namespace App\Model\Categories;

use App\Api\CategoryInterface;
use App\Api\ProductInterface;

abstract class CategoryModel implements CategoryInterface
{
    const NAME = '';

    const TAX = 0;
    
    /**
     * @var ProductInterface[] $products
     */
    public array $products;

    public function getName(): string
    {
        return static::NAME;
    }

    public function getTax(): float
    {
        return static::TAX;
    }

    public function addProduct(ProductInterface &$product): CategoryInterface
    {
        $product->setCategory($this);
        $this->products[] = $product;

        return $this;
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}
