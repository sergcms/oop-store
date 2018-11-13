<?php

namespace OOPStore;

class Auth implements AuthInterface
{
    private const PATH_CUSTOMERS = 'src' . DIRECTORY_SEPARATOR . 'DB'. DIRECTORY_SEPARATOR . 'customers.txt';

    public function cript($password, $salt = 'beetroot')
    {
        $password = htmlspecialchars(trim($password));

        return sha1($password . $salt);
    }

    public function getCustomers() 
    {
        if (file_exists(self::PATH_CUSTOMERS)) {
            return unserialize(file_get_contents(self::PATH_CUSTOMERS));
        }

        return [];
    }

    public function login(Customer $customer) 
    {
        $email = $customer->getEmail();
        $password = $this->cript($customer->getPassword());
        $customers = $this->getCustomers();

        if (!empty($this->getCustomers())) {
            foreach ($customers as $customer) {
                foreach ($customer as $value) {
                    if (($customer['email'] === $email) && ($customer['password'] === $password)) {
                        return $customer['fistName'] . ' ' . $customer['lastName'];
                    }
                }
            }
        }

        return 'not customer!';
    }

    public function registration(Customer $customer)
    {        
        if (!empty($this->getCustomers())) {
            $data = $this->getCustomers();
        }

        $data[] = [
            'fistName' => $customer->getFirstName(),
            'lastName' => $customer->getLastName(),
            'password' => $this->cript($customer->getPassword()),
            'email' => $customer->getEmail(),
        ];

        file_put_contents(self::PATH_CUSTOMERS, serialize($data));
    }
}
