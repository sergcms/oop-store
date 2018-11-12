<?php

namespace OOPStore;

interface CustomerInterface
{
    public function setFirstName($firstName);
    public function getFirstName(): string;
    public function setLastName($lastName);
    public function getLastName(): string;
    public function setPassword($password);
    public function getPassword(): string;
    public function setEmail($email);
    public function getEmail(): string;
    public function getFullName(): string;
}