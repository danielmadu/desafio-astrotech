<?php

namespace App\Api;

interface CategoryInterface
{
    public function getName() : string;

    public function getTax() : float;

    public function getProducts() : array;

    public function addProduct(ProductInterface &$product) : CategoryInterface;
}
