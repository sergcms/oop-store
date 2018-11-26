<?php

namespace OOPStore;

interface CategoryInterface
{
    public function setName($name): void;
    public function getName(): string;
}