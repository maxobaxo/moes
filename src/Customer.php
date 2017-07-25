<?php

class Customer
{
    private $contact;
    private $business;
    private $address;
    private $phone;
    private $email;
    private $login;
    private $password;
    private $id;

    function __construct($contact, $business, $address, $phone, $email, $login = null, $password = null, $id = null)
    {
        $this->contact = $contact;
        $this->business = $business;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
    }

    function getContact()
    {
        return $this->contact;
    }

    function setContact($new_contact)
    {
        $this->contact = $new_contact;
    }

    function getBusiness()
    {
        return $this->business;
    }

    function setBusiness($new_business)
    {
        $this->business = $new_business;
    }

    function getAddress()
    {
        return $this->address;
    }

    function setAddress($new_address)
    {
        $this->address = $new_address;
    }

    function getPhone()
    {
        return $this->phone;
    }

    function setPhone($new_phone)
    {
        $this->phone = $new_phone;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setEmail($new_email)
    {
        $this->email = $new_email;
    }

    function getLogin()
    {
        return $this->login;
    }

    function setLogin($new_login)
    {
        $this->login = $new_login;
    }

    function getPassword()
    {
        return $this->password;
    }

    function setPassword($new_pass)
    {
        $this->password = $new_pass;
    }

    function getID()
    {
        return $this->id;
    }

    function save()
    {
        $login = $this->getLogin();
        $customers = Customer::getAll();
        foreach($customers as $customer){
        if ($customer->getLogin() == $login){
        return false;
        }}
        $executed = $GLOBALS['DB']->exec("INSERT INTO customers (contact, business, address, phone, email, login, password) VALUES ('{$this->getContact()}', '{$this->getBusiness()}', '{$this->getAddress()}', '{$this->getPhone()}', '{$this->getEmail()}', '{$this->getLogin()}', '{$this->getPassword()}')");
        if ($executed) {
            $this->id = $GLOBALS['DB']->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    static function getAll()
    {
        $returned_customers = $GLOBALS['DB']->query("SELECT * FROM customers;");
        $customers = array();

        foreach ($returned_customers as $customer) {
            $contact = $customer['contact'];
            $business = $customer['business'];
            $address = $customer['address'];
            $phone = $customer['phone'];
            $email = $customer['email'];
            $id = $customer['id'];
            $login = $customer['login'];
            $password = $customer['password'];
            $new_customer = new Customer($contact, $business, $address, $phone, $email, $login, $password, $id);
            array_push($customers, $new_customer);
        }
        return $customers;
    }

    static function deleteAll()
    {
        $executed = $GLOBALS['DB']->exec("DELETE FROM customers;");
        if ($executed) {
            return true;
        } else {
            return false;
        }
    }

    static function find($search_id)
    {
        $found_customer = null;
        $returned_customers = $GLOBALS['DB']->prepare("SELECT * FROM customers WHERE id = :id");
        $returned_customers->bindParam(':id', $search_id, PDO::PARAM_STR);
        $returned_customers->execute();
        foreach($returned_customers as $customer) {
            $contact = $customer['contact'];
            $business = $customer['business'];
            $address = $customer['address'];
            $phone = $customer['phone'];
            $email = $customer['email'];
            $id = $customer['id'];
            $login = $customer['login'];
            $password = $customer['password'];
            if ($id == $search_id) {
                $found_customer = new Customer($contact, $business, $address, $phone, $email, $login, $password, $id);
            }
        }
        return $found_customer;
    }

    function updateContact($new_contact)
    {
        $executed = $GLOBALS['DB']->exec("UPDATE customers SET contact = '{$new_contact}' WHERE id = {$this->getID()};");
        if ($executed) {
            $this->setContact($new_contact);
            return true;
        } else {
            return false;
        }
    }

    function updateBusiness($new_business)
    {
        $executed = $GLOBALS['DB']->exec("UPDATE customers SET business = '{$new_business}' WHERE id = {$this->getID()};");
        if ($executed) {
            $this->setBusiness($new_business);
            return true;
        } else {
            return false;
        }
    }

    function updateAddress($new_address)
    {
        $executed = $GLOBALS['DB']->exec("UPDATE customers SET address = '{$new_address}' WHERE id = {$this->getID()};");
        if ($executed) {
            $this->setAddress($new_address);
            return true;
        } else {
            return false;
        }
    }

    function updatePhone($new_phone)
    {
        $executed = $GLOBALS['DB']->exec("UPDATE customers SET phone = '{$new_phone}' WHERE id = {$this->getID()};");
        if ($executed) {
            $this->setPhone($new_phone);
            return true;
        } else {
            return false;
        }
    }

    function updateEmail($new_email)
    {
        $executed = $GLOBALS['DB']->exec("UPDATE customers SET email = '{$new_email}' WHERE id = {$this->getID()};");
        if ($executed) {
            $this->setEmail($new_email);
            return true;
        } else {
            return false;
        }
    }

    function getCarts()
    {
        $returned_carts = $GLOBALS['DB']->query("SELECT carts.* FROM customers JOIN customers_carts ON (customers_carts.customer_id = customers.id) JOIN carts ON (carts.id = customers_carts.cart_id) WHERE customers.id = {$this->getID()};");
        $carts = array();
        foreach ($returned_carts as $cart) {
            $order_date = $cart['order_date'];
            $order_number = $cart['order_number'];
            $order_cost = $cart['order_cost'];
            $autoship = $cart['autoship'];
            $id = $cart['id'];
            $new_cart = new Cart($order_date, $order_number, $order_cost, $autoship, $id);
            array_push($carts, $new_cart);
        }
        return $carts;
    }

    function addCart($cart)
    {
        $returned_carts = "INSERT INTO customers_carts (customer_id, cart_id) VALUES ({$this->getID()}, {$cart->getID()});";
        $executed = $GLOBALS['DB']->exec("INSERT INTO customers_carts (customer_id, cart_id) VALUES ({$this->getID()}, {$cart->getID()});");
        if ($executed) {
            return true;
        } else {
            return false;
        }
    }

    function delete()
    {
        $executed = $GLOBALS['DB']->exec("DELETE FROM customers WHERE id = {$this->getID()};");
        if (!$executed) {
            return false;
        // } else {
        //     $GLOBALS['DB']->exec("DELETE FROM  WHERE store_id = {$this->getID()};");
        //     if (!$executed) {
        //         return false;
        //     } else {
        //         return true;
        //     }
        }

    }

    function loginCheck()
    {
        $login = $this->login;
        $password = $this->password;
        $customers = Customer::getAll();
        $result = false;
        foreach($customers as $customer)
        {
            if($customer->login == $login)
            {
                if($customer->password == $password)
                {
                    $result = Customer::find($customer->getID());
                    return $result;
                }
            }
        }
        if ($result == false)
        {
            return false;
        }
    }



}



?>
