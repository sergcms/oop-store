<?php

namespace OOPStore;

interface CartInterface
{
    public function getCustomer();
    public function addProduct(Product $product, Store $store);    
    public function getTotal();
    public function removeProduct(Product $product, Store $store);
    public function hasProduct(Product $product);
    public function createPurchase(): Purchase;
}