<?php

namespace OOPStore;

class Product implements ProductInterface
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

    public function getId()
    {
        return $this->id;
    }

    public function setCategory(Category $category) 
    {
        $this->category = $category;
    }

    public function getCategory() 
    {
        return $this->category;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName() 
    {
        return $this->name;
    }

    public function setPrice()
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }
}
