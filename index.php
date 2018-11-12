<?php

namespace OOPStore;

$register = $_REQUEST['register'] ?? false;

define('INTERFACES_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'interfaces');
define('CLASSES_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'classes');

function requireDir($dir) 
{
    $d = dir($dir);

    while (false !== ($classFile = $d->read())) {
        if ($classFile === '.' || $classFile === '..') {
            continue;
        }
        require_once($dir . DIRECTORY_SEPARATOR . $classFile);
    }
}
   
requireDir(INTERFACES_DIR);
requireDir(CLASSES_DIR);

$category = new Category("TV");
$product1 = new Product($category, "LG LX35", 50000);
$product2 = new Product($category, "SAMSUNG SF55", 100000);
$product3 = new Product($category, "ROMSAT FT40", 200000);

$store = new Store();
$store->addProduct($product1);
$store->addProduct($product2);
$store->addProduct($product3);

$customer = new Customer('Serhii', 'Fryntsko', '12345', 'test@gmail.com');

$cart = new Cart($customer);
$cart->addProduct($product1, $store);
$cart->addProduct($product2, $store);

echo 'Store products - ' . count($store->getProducts()) . PHP_EOL;
echo 'Cart total: ' . $cart->getTotal() . PHP_EOL;

$cart->removeProduct($product1, $store);
echo 'Store products - ' . count($store->getProducts()) . PHP_EOL;
echo 'Cart total: ' . $cart->getTotal() . PHP_EOL;

// $purchase = $cart->createPurchase();
