<?php

declare(strict_types=1);

namespace past projects\online store\classes;
class Product
{
    public string $title;
    public string $description;
    public float $price;
    public false|int $discount;

    public function __construct(string $title, string $description, float $price, false|int $discount = false)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->discount = $discount;
    }

    public function __toString(): string
    {
        if (gettype($this->discount) === 'integer') {
            $discountedPrice = number_format($this->price * (1 - ($this->discount / 100)), 2, '.', '');
            return "
            <div class='product'>
                <h3>$this->title</h3>
                <span class='old-price'>Original price: £$this->price</span><br /><br />
                <span class='discount'>With $this->discount% discount - £$discountedPrice</span>
            <p>$this->description</p>
            </div>
            ";
        }

        return "
        <div class='product'>
            <h3>$this->title</h3>
            <span>Price: £$this->price</span>
            <p>$this->description</p>
        </div>
        ";
    }
}

class SmallProduct extends \Product
{
    public float $weight;

    public function __construct(string $title, string $description, float $price, float $weight, false|int $discount = false)
    {
        parent::__construct($title, $description, $price, $discount);
        $this->weight = $weight;
    }
}

class LargeProduct extends Product
{
    public float $width;
    public float $height;
    public float $depth;

    public function __construct(string $title, string $description, float $price, float $width, float $height, float $depth, false|int $discount = false)
    {
        parent::__construct($title, $description, $price, $discount);
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
    }
}