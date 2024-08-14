<?php

declare(strict_types=1);

require_once 'classes/Product.php';
require_once 'classes/Basket.php';
require_once 'classes/Customer.php';

// Products
$hat = new Product('Silly Yellow Hat', 'This is a silly yellow hat if you buy this hat you are a silly person.', 5.67, 10);
$furCoat = new Product('Lavish Fur Coat', 'This lavish fur coat will make you stand out against your aristocratic peers.', 440.25, 25);
$skateboard = new Product('Cool Skateboard', 'This skateboard is cool.', 40, false);
// Small Products
$ring = new SmallProduct('Diamond Ring', 'A rare diamond ring made from premium diamond', 40000, 0.01, false);
// Large Products
$bathtub = new LargeProduct('Bathtub', 'A rather large bathtub', 849.99, 0.8, 0.5,1.5, 10);


// Customer
$customer = new BusinessCustomer('Cuthbert', 'Goggins', '42 Jupiter Rd', 'JP94 6MW', 'CuthbertGoggins@hotmail.com', 'Cuthbert Enterprises', 'j345in345i');
// Business Customer
$customer2 = new Customer('Dave', 'Jones', '94 Avon Rd', 'BS49 JJ6', 'DaveJones@hotmail.com');



// Comparing baskets of a Normal Customer and a Business Customer

//Basket for Normal Customer
$myBasket = new Basket($customer);
// Add items
$myBasket->addToBasket($skateboard);
$myBasket->addToBasket($ring);
$myBasket->addToBasket($bathtub);
// Basket for Business Customer
$myBasket2 = new Basket($customer2);
// Add items
$myBasket2->addToBasket($skateboard);
$myBasket2->addToBasket($ring);
$myBasket2->addToBasket($bathtub);

echo $myBasket;
echo $myBasket2;
echo $furCoat;

//echo $myBasket->totalPrice();
//echo '<br />';
//echo $myBasket2->totalPrice();
//echo $myBasket;
//echo $customer->getFullAddress();