<?php
    class Cart
    {
        private $order_date;
        private $order_number;
        private $order_cost;
        private $id;

        function __construct($order_date, $order_number, $order_cost, $id = null)
        {
            $this->order_date = $order_date;
            $this->order_number = $order_number;
            $this->order_cost = $order_cost;
            $this->id = $id;
        }

        function getOrderDate()
        {
            return $this->order_date;
        }

    }
?>
