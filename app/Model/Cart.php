<?php

namespace App\Model;

use App\Api\CartInterface;
use App\Api\ProductInterface;

final class Cart implements CartInterface
{
    /**
     * @var ProductInterface[]
     */
    public array $itens;

    public function addItem(ProductInterface $product) : CartInterface
    {
        $this->itens[] = $product;

        return $this;
    }

    public function getItens(): array
    {
        return $this->itens;
    }

    public function caclculateTotal(): float
    {
        $total = \array_reduce($this->itens, function ($carry, ProductInterface $item) {
            $carry += $item->getPrice();

            return $carry;
        });

        return $total;
    }

    public function calculateTaxTotal(): float
    {
        $total = \array_reduce($this->itens, function ($carry, ProductInterface $item) {
            $carry += ($item->getPrice() * $item->getCategory()->getTax());

            return $carry;
        });

        return $total;
    }

    public function caclculateNetTotal(): float
    {
        $total = \array_reduce($this->itens, function ($carry, ProductInterface $item) {
            $carry += $item->getPrice() + ($item->getPrice() * $item->getCategory()->getTax());

            return $carry;
        });

        return $total;
    }

    public function countItens(): int
    {
        return count($this->itens);
    }
}
