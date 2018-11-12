<?php

namespace OOPStore;

interface ProductInterface
{
    public function getId();
    public function setCategory(Category $category);
    public function getCategory();
    public function setName($name);
    public function getName();
    public function setPrice();
    public function getPrice();
}