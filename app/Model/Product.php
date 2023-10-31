<?php

namespace App\Model;

use App\Api\CategoryInterface;
use App\Api\ProductInterface;

class Product implements ProductInterface
{
    private CategoryInterface $category;

    public function __construct(
        public readonly string $name,
        public readonly float $price
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getCategory(): CategoryInterface
    {
        return $this->category;
    }

    public function setCategory(CategoryInterface $category): void
    {
        $this->category = $category;
    }
}
