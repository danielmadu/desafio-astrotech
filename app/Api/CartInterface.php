<?php

namespace App\Api;

interface CartInterface
{
    /**
     * @return ProductInterface[]
     */
    public function getItens() : array;

    public function addItem(ProductInterface $product) : CartInterface;

    public function caclculateNetTotal() : float;

    public function caclculateTotal() : float;

    public function calculateTaxTotal() : float;

    public function countItens() : int;
}
