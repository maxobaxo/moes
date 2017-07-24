<?php
    class Cart
    {
        private $order_date;
        private $order_number;
        private $order_cost;
        private $autoship;
        private $id;

        function __construct($order_date, $order_number, $order_cost, $autoship = 0, $id = null)
        {
            $this->order_date = $order_date;
            $this->order_number = $order_number;
            $this->order_cost = $order_cost;
            $this->autoship = $autoship;
            $this->id = $id;
        }

        function getOrderDate()
        {
            return $this->order_date;
        }

        function setOrderDate($new_order_date)
        {
            $this->order_date = $new_order_date;
        }

        function getOrderNumber()
        {
            return $this->order_number;
        }

        function setOrderNumber($new_order_number)
        {
            $this->order_number = $new_order_number;
        }

        function getOrderCost()
        {
            return $this->order_cost;
        }

        function setOrderCost($new_order_cost)
        {
            $this->order_cost = $new_order_cost;
        }

        function getAutoship()
        {
            return $this->autoship;
        }

        function setAutoship($new_autoship)
        {
            $this->autoship = $new_autoship;
        }

        function getID()
        {
            return $this->id;
        }

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO carts (order_date, order_number, order_cost, autoship) VALUES ('{$this->getOrderDate()}', {$this->getOrderNumber()}, {$this->getOrderCost()}, {$this->getAutoship()});");
            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

        static function deleteAll()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM carts;");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }

        static function getAll()
        {
            $carts = array();
            $returned_carts = $GLOBALS['DB']->query("SELECT * FROM carts;");
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

        function delete()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM carts WHERE id = {$this->getID()};");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }

        function updateAutoship($new_autoship)
        {
            $executed = $GLOBALS['DB']->exec("UPDATE carts SET autoship = {$new_autoship} WHERE id = {$this->getID()};");
            if ($executed) {
                $this->setAutoship($new_autoship);
                return true;
            } else {
                return false;
            }
        }

        function updateOrderDate($new_order_date)
        {
            $executed = $GLOBALS['DB']->exec("UPDATE carts SET order_date = {$new_order_date} WHERE id = {$this->getID()};");
            if ($executed) {
                $this->setOrderDate($new_order_date);
                return true;
            } else {
                return false;
            }
        }
    }
?>
