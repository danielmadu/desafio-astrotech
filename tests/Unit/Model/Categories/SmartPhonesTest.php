<?php

use App\Api\CategoryInterface;
use App\Model\Categories\SmartPhones;
use PHPUnit\Framework\TestCase;

/**
 * @covers  SmartPhones
 */
final class SmartPhonesTest extends TestCase
{
    public CategoryInterface $category;

    protected function setUp(): void
    {
        $this->category = new SmartPhones;
    }

    public function testGetName(): void
    {
        $this->assertEquals('Smart Phones', $this->category->getName());
    }

    public function testGetTax(): void
    {
        $this->assertEquals(0.08, $this->category->getTax());
    }
}
