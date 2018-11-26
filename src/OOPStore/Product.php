<?php

namespace OOPStore;

use OOPStore\Category;
use OOPStore\Product;
use OOPStore\Purchase;

class Product implements \OOPStore\ProductInterface
{
    private $id;
    private $category;
    private $name;
    private $price;
    static private $lastID = 0;

    public function __construct(Category $category, $name, $price) 
    {
        $this->id = ++self::$lastID;
        $this->category = $category;
        $this->name = $name;
        $this->price = $price;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setCategory(Category $category): void 
    {
        $this->category = $category;
    }

    public function getCategory(): Category 
    {
        return $this->category;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getName(): string 
    {
        return $this->name;
    }

    public function setPrice(): void
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
