<?php

class Customer
{
    private $contact;
    private $business;
    private $address;
    private $phone;
    private $email;
    private $id;

    function __construct($contact, $business, $address, $phone, $email, $id = null)
    {
        $this->contact = $contact;
        $this->business = $business;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->id = $id;
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

    function getId()
    {
        return $this->id;
    }

    function save()
    {
        $executed = $GLOBALS['DB']->exec("INSERT INTO customers (contact, business, address, phone, email) VALUES ('{$this->getContact()}', '{$this->getBusiness()}', '{$this->getAddress()}', '{$this->getPhone()}', '{$this->getEmail()}')");
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
            $new_customer = new Customer($contact, $business, $address, $phone, $email, $id);
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
            if ($id == $search_id) {
                $found_customer = new Customer($contact, $business, $address, $phone, $email, $id);
            }
        }
        return $found_customer;
    }









}



?>
