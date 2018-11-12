<?php

namespace OOPStore;

class Auth {
    
    const PATH_CUSTOMERS = __DIR__ . DIRECTORY_SEPARATOR . 'DB'. DIRECTORY_SEPARATOR . 'customers.txt';
    private $password;

    public function __constract() 
    {
        if (!file_exists('DB\customers.txt')) {
            file_put_contents('DB\customers.txt', serialize([]));
        }
    }

    public function cript($password, $salt = 'beetroot')
    {
        $password = htmlspecialchars(trim($password));
        $this->password = sha1($password . $salt);

        return $this->password;
    }

    public function getCustomers() 
    {
        if (file_exists('DB\customers.txt')) {
            return unserialize(file_get_contents('DB\customers.txt'));
        }

        return false;
    }

    public function login(Customer $customer) 
    {
        $email = $customer->getEmail();
        $password = self::cript($customer->getPassword());
        $data = [];

        $data[] = self::getCustomers();

        return unserialize($data);
    }

    public function registration(Customer $customer)
    {        
        if (!empty(self::getCustomers())) {
            $data[] = self::getCustomers();
        }
        
        $data[] = [
            'fistName' => $customer->getFirstName(),
            'lastName' => $customer->getLastName(),
            'password' => self::cript($customer->getPassword()),
            'email' => $customer->getEmail(),
        ];

        // print_r($data);

        // return $data;
        
        file_put_contents('DB\customers.txt', serialize($data), FILE_APPEND);
    }

}
