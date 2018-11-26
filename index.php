<?php

namespace OOPStore;

use OOPStore;

spl_autoload_register(function($class) {
    require __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
});


$category = new Category("TV");
$product1 = new Product($category, "LG LX35", 50000);
$product2 = new Product($category, "SAMSUNG SF55", 100000);
$product3 = new Product($category, "ROMSAT FT40", 200000);

$store = new Store();
$store->addProduct($product1);
$store->addProduct($product2);
$store->addProduct($product3);

$customer1 = new Customer('Serhii', 'Fryntsko', '12345', 'test@gmail.com');
$customer2 = new Customer('Alex', 'Petrenko', '654321', 'test10@gmail.com');
$customer3 = new Customer('Sara', 'Conor', '111111', 'test30@gmail.com');

$auth = new Auth();
$auth->registration($customer1);
$auth->registration($customer2);
$auth->registration($customer3);
echo 'Costomer - ' . $auth->login($customer3) . PHP_EOL;

$cart = new Cart($customer1);
$cart->addProduct($product1, $store);
$cart->addProduct($product2, $store);

echo 'Store products - ' . count($store->getProducts()) . PHP_EOL;
echo 'Cart total: ' . $cart->getTotal() . PHP_EOL;

$cart->removeProduct($product1, $store);
echo 'Store products - ' . count($store->getProducts()) . PHP_EOL;
echo 'Cart total: ' . $cart->getTotal() . PHP_EOL;

$purchase = $cart->createPurchase();
