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

        function getOrderCost()
        {
            return $this->order_cost;
        }

        function getAutoship()
        {
            return $this->autoship;
        }

        function getID()
        {
            return $this->autoship;
        }

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO carts (order_date, order_number, order_cost, autoship) VALUES ('{$this->getOrderDate()}', '{$this->getOrderNumber()}', '{$this->getOrderCost()}', '{$this->getAutoship()}');");
            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

    }
?>
