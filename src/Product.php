<?php
    class Product
    {
        private $name;
        private $price;
        private $id;

        function __construct($name, $price, $id = null)
        {
            $this->name = $name;
            $this->price = $price;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getPrice()
        {
            return $this->price;
        }

        function setPrice($new_price)
        {
            $this->price = $new_price;
        }

        function getID()
        {
            return $this->id;
        }

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO products (name, price) VALUES ('{$this->getName()}', {$this->getPrice()});");
            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

        static function deleteAll()
        {
            // $executed = $GLOBALS['DB']->exec("DELETE FROM carts;");
            // if ($executed) {
            //     return true;
            // } else {
            //     return false;
            // }
        }

        static function getAll()
        {
            // $carts = array();
            // $returned_carts = $GLOBALS['DB']->query("SELECT * FROM carts;");
            // foreach ($returned_carts as $cart) {
            //     $order_date = $cart['order_date'];
            //     $order_number = $cart['order_number'];
            //     $order_cost = $cart['order_cost'];
            //     $autoship = $cart['autoship'];
            //     $id = $cart['id'];
            //     $new_cart = new Cart($order_date, $order_number, $order_cost, $autoship, $id);
            //     array_push($carts, $new_cart);
            // }
            // return $carts;
        }

        function delete()
        {
            // $executed = $GLOBALS['DB']->exec("DELETE FROM carts WHERE id = {$this->getID()};");
            // if ($executed) {
            //     return true;
            // } else {
            //     return false;
            // }
        }

        function updateName($new_name)
        {
            // $executed = $GLOBALS['DB']->exec("UPDATE carts SET autoship = {$new_autoship} WHERE id = {$this->getID()};");
            // if ($executed) {
            //     $this->setAutoship($new_autoship);
            //     return true;
            // } else {
            //     return false;
            // }
        }

        function updatePrice($new_price)
        {
            // $executed = $GLOBALS['DB']->exec("UPDATE carts SET order_date = {$new_order_date} WHERE id = {$this->getID()};");
            // if ($executed) {
            //     $this->setOrderDate($new_order_date);
            //     return true;
            // } else {
            //     return false;
            // }
        }

        static function findByID($search_id)
        {
            // $found_cart = null;
            // $returned_carts = $GLOBALS['DB']->prepare("SELECT * FROM carts WHERE id = :id;");
            // $returned_carts->bindPARAM(':id', $search_id, PDO::PARAM_STR);
            // $returned_carts->execute();
            //
            // foreach ($returned_carts as $cart) {
            //     $order_date = $cart['order_date'];
            //     $order_number = $cart['order_number'];
            //     $order_cost = $cart['order_cost'];
            //     $autoship = $cart['autoship'];
            //     $id = $cart['id'];
            //     if ($id == $search_id) {
            //         $found_cart = new Cart($order_date, $order_number, $order_cost, $autoship, $id);
            //     }
            // }
            // return $found_cart;
        }

        static function findByName($search_name)
        {
            // $found_cart = null;
            // $returned_carts = $GLOBALS['DB']->prepare("SELECT * FROM carts WHERE order_date = :order_date;");
            // $returned_carts->bindPARAM(':order_date', $search_order_date, PDO::PARAM_STR);
            // $returned_carts->execute();
            //
            // foreach ($returned_carts as $cart) {
            //     $order_date = $cart['order_date'];
            //     $order_number = $cart['order_number'];
            //     $order_cost = $cart['order_cost'];
            //     $autoship = $cart['autoship'];
            //     $id = $cart['id'];
            //     if ($order_date == $search_order_date) {
            //         $found_cart = new Cart($order_date, $order_number, $order_cost, $autoship, $id);
            //     }
            // }
            // return $found_cart;
        }
    }
?>
