<?php

namespace OOPStore;

interface CustomerInterface
{
    public function setFirstName($firstName): void;
    public function getFirstName(): string;
    public function setLastName($lastName): void;
    public function getLastName(): string;
    public function setPassword($password): void;
    public function getPassword(): string;
    public function setEmail($email): void;
    public function getEmail(): string;
    public function getFullName(): string;
}