<?php

namespace OOPStore;

class Category implements CategoryInterface
{
    private $name;

    public function __construct($name) 
    {
        $this->name = $name;
    }
    
    public function setName($name): void 
    {
        $this->name = $name;
    }

    public function getName(): string 
    {
        return $this->name;
    }
}
