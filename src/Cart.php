<?php
    class Cart
    {
        private $order_date;
        private $order_number;
        private $order_cost;
        private $autoship;
        private $id;

        function __construct($order_date, $order_number, $order_cost, $autoship, $id = null)
        {
            $this->order_date = $order_date;
            $this->order_number = $order_number;
            $this->order_cost = $order_cost;
            $this->autoship = 0;
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

    }
?>
