<?php

use App\Api\CategoryInterface;
use App\Model\Categories\Notebooks;
use PHPUnit\Framework\TestCase;

/**
 * @covers  Notebooks
 */
final class NotebooksTest extends TestCase
{
    public CategoryInterface $category;

    protected function setUp(): void
    {
        $this->category = new Notebooks;
    }

    public function testGetName(): void
    {
        $this->assertEquals('Notebooks', $this->category->getName());
    }

    public function testGetTax(): void
    {
        $this->assertEquals(0.06, $this->category->getTax());
    }
}
