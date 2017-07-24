<?php
    /**
    *@backupGlobals disabled
    *@backupStaticAttributes disabled
    */

    require_once 'src/Cart.php';

    $server = 'mysql:host=localhost:8889;dbname=moes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class CartTest extends PHPUnit_Framework_TestCase
    {
        function testGetOrderDate()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_number = 543;
            $order_cost = 55.50;
            $test_cart = new Cart($order_date, $order_number, $order_cost);

            // Act
            $result = $test_cart->getOrderDate();

            // Assert
            $this->assertEquals($order_date, $result);
        }

        function testSetOrderDate()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_number = 543;
            $order_cost = 55.50;
            $test_cart = new Cart($order_date, $order_number, $order_cost);

            $new_order_date = '2017-06-01';

            // Act
            $test_cart->setOrderDate($new_order_date);
            $result = $test_cart->getOrderDate();

            // Assert
            $this->assertEquals($new_order_date, $result);
        }

        function testGetOrderNumber()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_number = 543;
            $order_cost = 55.50;
            $test_cart = new Cart($order_date, $order_number, $order_cost);

            // Act
            $result = $test_cart->getOrderNumber();

            // Assert
            $this->assertEquals($order_number, $result);
        }
    }
