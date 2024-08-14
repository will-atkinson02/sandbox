<?php

declare(strict_types=1);

namespace past use Customer;
use hasVATNumber;
use Product;

projects\online store\classes;
require_once 'Product.php';
require_once 'Customer.php';


class Basket
{
    protected Customer $userType;
    public array $products = [];
    public Product $newProduct;

    public function __construct(Customer $userType)
    {
        $this->userType = $userType;
    }

    public function __toString(): string
    {
        $listItems = '';
        foreach ($this->products as $product) {
            $productTitle = $product->title;
            if (gettype($product->discount) === 'integer') {
                $discountedPrice = number_format($product->price * (1 - ($product->discount / 100)), 2, '.', '');
                $listItems .= "<li>$productTitle (<i>$product->discount% discount</i>) - £$discountedPrice</li>";
            } else {
                $productPrice = $product->price;
                $listItems .= "<li>$productTitle - £$productPrice</li>";
            }
        }

        if ($listItems === '') {
            return 'Your basket is currently empty';
        }

        return "
        <h2>My Basket:</h2>
        <ul>
            $listItems
        </ul>
        ";
    }

    public function addToBasket(Product $newProduct): void
    {
        $this->products[] = $newProduct;
    }

    public function totalPrice(): string
    {
        $total = 0;
        foreach ($this->products as $product) {

            if ($product->discount === false) {
                $productPrice = $product->price * (1 - ($product->discount / 100));
            } else {
                $productPrice = $product->price;
            }
            $total += $productPrice;
        }

        if (!$this->userType instanceof hasVATNumber) {
            $total *= 1.2;
            return number_format($total, 2, '.', '');

        }
        return number_format($total, 2, '.', '');
    }

}