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
        protected function tearDown()
        {
            Cart::deleteAll();
        }

        function testGetOrderDate()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_number = 543;
            $order_cost = 55.50;
            $autoship = 1;
            $test_cart = new Cart($order_date, $order_number, $order_cost, $autoship);

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
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_number, $order_cost, $autoship);

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
            $autoship = 1;
            $test_cart = new Cart($order_date, $order_number, $order_cost, $autoship);

            // Act
            $result = $test_cart->getOrderNumber();

            // Assert
            $this->assertEquals($order_number, $result);
        }

        function testSetOrderNumber()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_number = 543;
            $order_cost = 55.50;
            $autoship = 1;
            $test_cart = new Cart($order_date, $order_number, $order_cost, $autoship);

            $new_order_number = 544;

            // Act
            $test_cart->setOrderNumber($new_order_number);
            $result = $test_cart->getOrderNumber();

            // Assert
            $this->assertEquals($new_order_number, $result);

        }

        function testGetOrderCost()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_number = 543;
            $order_cost = 55.50;
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_number, $order_cost, $autoship);

            // Act
            $result = $test_cart->getOrderCost();

            // Assert
            $this->assertEquals($order_cost, $result);
        }

        function testSetOrderCost()
        {
            $order_date = date('Y-m-d', time());
            $order_number = 543;
            $order_cost = 55.50;
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_number, $order_cost, $autoship);

            $new_order_cost = 95.50;

            // Act
            $test_cart->setOrderCost($new_order_cost);
            $result = $test_cart->getOrderCost();

            // Assert
            $this->assertEquals($new_order_cost, $result);
        }

        function testGetAutoship()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_number = 543;
            $order_cost = 55.50;
            $autoship = 1;
            $test_cart = new Cart($order_date, $order_number, $order_cost, $autoship);

            // Act
            $result = $test_cart->getAutoship();

            // Assert
            $this->assertEquals($autoship, $result);
        }

        function testSetAutoship()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_number = 543;
            $order_cost = 55.50;
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_number, $order_cost, $autoship);

            $new_autoship = 1;

            // Act
            $test_cart->setAutoship($new_autoship);
            $result = $test_cart->getAutoship();

            // Assert
            $this->assertEquals($new_autoship, $result);
        }

        function testGetID()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_number = 543;
            $order_cost = 55.50;
            $autoship = 1;
            $test_cart = new Cart($order_date, $order_number, $order_cost, $autoship);
            $test_cart->save();

            // Act
            $result = $test_cart->getID();

            // Assert
            $this->assertTrue(is_numeric($result));
        }

        function testSave()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_number = 543;
            $order_cost = 55.50;
            $autoship = 1;
            $test_cart = new Cart($order_date, $order_number, $order_cost, $autoship);

            // Act
            $executed = $test_cart->save();

            // Assert
            $this->assertTrue($executed, 'The cart was not saved to the database');
        }

        function testDeleteAll()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_number = 543;
            $order_cost = 55.50;
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_number, $order_cost, $autoship);
            $test_cart->save();

            $order_date2 = date('Y-m-d', time());
            $order_number2 = 543;
            $order_cost2 = 55.50;
            $autoship2 = 1;
            $test_cart2 = new Cart($order_date2, $order_number2, $order_cost2, $autoship2);
            $test_cart2->save();

            // Act
            Cart::deleteAll();
            $result = Cart::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

        function testGetAll()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_number = 543;
            $order_cost = 55.50;
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_number, $order_cost, $autoship);
            $test_cart->save();

            $order_date2 = date('Y-m-d', time());
            $order_number2 = 543;
            $order_cost2 = 55.50;
            $autoship2 = 1;
            $test_cart2 = new Cart($order_date2, $order_number2, $order_cost2, $autoship2);
            $test_cart2->save();

            // Act
            $result = Cart::getAll();

            // Assert
            $this->assertEquals([$test_cart, $test_cart2], $result);
        }
    }
