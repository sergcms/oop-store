<?php

namespace OOPStore;

interface AuthInterface 
{
    public function cript($password, $salt = 'beetroot');
    public function getCustomers();
    public function login(Customer $customer);
    public function registration(Customer $customer);
}
