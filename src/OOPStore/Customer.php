<?php

namespace OOPStore;

class Customer implements CustomerInterface
{
    private $firstName;
    private $lastName;
    private $password;
    private $email;

    public function __construct($firstName, $lastName, $password, $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->password = $password;
        $this->email = $email;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFullName(): string 
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
