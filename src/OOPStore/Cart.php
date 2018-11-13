<?php

namespace OOPStore;

class Cart implements CartInterface
{
    private $customer;
    private $products;
    private $purchase;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
        $this->products = [];            
    }

    public function getCustomer()
    {
        return $this->customer;
    }
    
    public function addProduct(Product $product, Store $store) 
    {
        if (empty($this->purchase) && $store->hasProduct($product)) {
            $this->products[$product->getId()] = $product;
            $store->removeProduct($product);
        }
    }

    public function getTotal()
    {
        $total = 0;

        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }

        return $total;
    }

    public function removeProduct(Product $product, Store $store)
    {
        if ($this->hasProduct($product)) {
            unset($this->products[$product->getId()]);
            $store->addProduct($product);
            
            return true;
        }

        return false;
    }

    public function hasProduct(Product $product): bool
    {
        return isset($this->products[$product->getId()]);
    }

    public function createPurchase(): Purchase
    {
        $this->purchase = new Purchase($this);

        return $this->purchase;
    }
}
