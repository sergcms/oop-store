<?php

namespace OOPStore;

use OOPStore;
use OOPStore\Category;
use OOPStore\Product;
use OOPStore\Purchase;

interface ProductInterface
{
    public function getId(): int;
    public function setCategory(Category $category): void;
    public function getCategory(): Category;
    public function setName($name): void;
    public function getName(): string;
    public function setPrice(): void;
    public function getPrice(): float;
}