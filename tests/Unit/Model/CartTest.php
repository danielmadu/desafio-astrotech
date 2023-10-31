<?php

use App\Api\CartInterface;
use App\Api\CategoryInterface;
use App\Api\ProductInterface;
use App\Model\Cart;
use App\Model\Categories\Eletrodomesticos;
use App\Model\Categories\Notebooks;
use App\Model\Categories\SmartPhones;
use App\Model\Product;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @covers  Cart
 */
final class CartTest extends TestCase
{
    public CartInterface $cart;

    protected function setUp(): void
    {
        $this->cart = new Cart;
    }

    #[DataProvider('dataProvider')]
    public function testCart($data): void
    {
        /** @var CategoryInterface $category */
        $category = $data['category'];

        foreach ($data['products'] as $product) {
            /** @var ProductInterface $product */
            $category
            ->addProduct($product);

            $this->cart
            ->addItem($product);
        }
        
        $this->assertEquals($data['total_tax'], $this->cart->calculateTaxTotal());
        $this->assertEquals($data['total_net'], $this->cart->caclculateNetTotal());
        $this->assertEquals($data['total'], $this->cart->caclculateTotal());
        $this->assertEquals($data['count'], $this->cart->countItens());
        $this->assertIsArray($this->cart->getItens());
    }

    public static function dataProvider(): array
    {
        return [
            'test Notebooks category' => [
                'data' => [
                    'category'  => new Notebooks,
                    'total_tax' => 18.0,
                    'total_net' => 318.0,
                    'total'     => 300.0,
                    'count'     => 2,
                    'products'  => [
                        new Product('test1', 100),
                        new Product('test2', 200)
                    ]
                ]
            ],
            'test Smart Phones category' => [
                'data' => [
                    'category'  => new SmartPhones,
                    'total_tax' => 24.0,
                    'total_net' => 324.0,
                    'total'     => 300.0,
                    'count'     => 2,
                    'products'  => [
                        new Product('test1', 100),
                        new Product('test2', 200)
                    ]
                ]
            ],
            'test Eletrodomésticos category' => [
                'data' => [
                    'category'  => new Eletrodomesticos,
                    'total_tax' => 40.0,
                    'total_net' => 440.0,
                    'total'     => 400.0,
                    'count'     => 3,
                    'products'  => [
                        new Product('test1', 100),
                        new Product('test2', 200),
                        new Product('test3', 100)
                    ],
                ]
            ],
        ];
    }
}
