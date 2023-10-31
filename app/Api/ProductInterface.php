<?php

namespace App\Api;

interface ProductInterface
{
    public function getCategory() : CategoryInterface;

    public function getName() : string;

    public function getPrice() : float;

    public function setCategory(CategoryInterface $category) : void;
}
