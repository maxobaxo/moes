<?php
    /**
    *@backupGlobals disabled
    *@backupStaticAttributes disabled
    */

    require_once 'src/Cart.php';
    require_once 'src/Product.php';

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
            $order_cost = 55.50;
            $autoship = 1;
            $test_cart = new Cart($order_date, $order_cost, $autoship);

            // Act
            $result = $test_cart->getOrderDate();

            // Assert
            $this->assertEquals($order_date, $result);
        }

        function testSetOrderDate()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_cost = 55.50;
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_cost, $autoship);

            $new_order_date = '2017-06-01';

            // Act
            $test_cart->setOrderDate($new_order_date);
            $result = $test_cart->getOrderDate();

            // Assert
            $this->assertEquals($new_order_date, $result);
        }

        function testGetOrderCost()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_cost = 55.50;
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_cost, $autoship);

            // Act
            $result = $test_cart->getOrderCost();

            // Assert
            $this->assertEquals($order_cost, $result);
        }

        function testSetOrderCost()
        {
            $order_date = date('Y-m-d', time());
            $order_cost = 55.50;
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_cost, $autoship);

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
            $order_cost = 55.50;
            $autoship = 1;
            $test_cart = new Cart($order_date, $order_cost, $autoship);

            // Act
            $result = $test_cart->getAutoship();

            // Assert
            $this->assertEquals($autoship, $result);
        }

        function testSetAutoship()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_cost = 55.50;
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_cost, $autoship);

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
            $order_cost = 55.50;
            $autoship = 1;
            $test_cart = new Cart($order_date, $order_cost, $autoship);
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
            $order_cost = 55.50;
            $autoship = 1;
            $test_cart = new Cart($order_date, $order_cost, $autoship);

            // Act
            $executed = $test_cart->save();

            // Assert
            $this->assertTrue($executed, 'The cart was not saved to the database');
        }

        function testDeleteAll()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_cost = 55.50;
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_cost, $autoship);
            $test_cart->save();

            $order_date2 = date('Y-m-d', time());
            $order_cost2 = 55.50;
            $autoship2 = 1;
            $test_cart2 = new Cart($order_date2, $order_cost2, $autoship2);
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
            $order_cost = 55.50;
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_cost, $autoship);
            $test_cart->save();

            $order_date2 = date('Y-m-d', time());
            $order_cost2 = 55.50;
            $autoship2 = 1;
            $test_cart2 = new Cart($order_date2, $order_cost2, $autoship2);
            $test_cart2->save();

            // Act
            $result = Cart::getAll();

            // Assert
            $this->assertEquals([$test_cart, $test_cart2], $result);
        }

        function testDelete()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_cost = number_format(55.50, 2);
            $autoship = 1;
            $test_cart = new Cart($order_date, $order_cost, $autoship);
            $test_cart->save();

            $order_date2 = date('Y-m-d', time());
            $order_cost2 = number_format(55777.50, 2);
            $autoship2 = 0;
            $test_cart2 = new Cart($order_date2, $order_cost2, $autoship2);
            $test_cart2->save();

            // Act
            $test_cart2->delete();

            // Assert
            $this->assertEquals([$test_cart], Cart::getAll());
        }

        function testUpdateAutoship()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_cost = number_format(55.50, 2);
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_cost, $autoship);
            $test_cart->save();

            $new_autoship = 1;

            // Act
            $test_cart->updateAutoship($new_autoship);
            $result = $test_cart->getAutoship();

            // Assert
            $this->assertEquals($new_autoship, $result);
        }

        function testUpdateOrderDate()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_cost = number_format(55.50, 2);
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_cost, $autoship);
            $test_cart->save();

            $new_order_date = '2017-05-02';

            // Act
            $test_cart->updateOrderDate($new_order_date);
            $result = $test_cart->getOrderDate();

            // Assert
            $this->assertEquals($new_order_date, $result);
        }

        function testFindByID()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_cost = number_format(55.50, 2);
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_cost, $autoship);
            $test_cart->save();

            $order_date2 = date('Y-m-d', time());
            $order_cost2 = number_format(55777.50, 2);
            $autoship2 = 0;
            $test_cart2 = new Cart($order_date2, $order_cost2, $autoship2);
            $test_cart2->save();

            // Act
            $result = Cart::findByID($test_cart->getID());

            // Assert
            $this->assertEquals($test_cart, $result);
        }

        function testFindByOrderDate()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_cost = number_format(55.50, 2);
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_cost, $autoship);
            $test_cart->save();

            $order_date2 = date('Y-m-d', time());
            $order_cost2 = number_format(55777.50, 2);
            $autoship2 = 0;
            $test_cart2 = new Cart($order_date2, $order_cost2, $autoship2);
            $test_cart2->save();

            // Act
            $result = Cart::findByOrderDate($test_cart->getOrderDate());

            // Assert
            $this->assertEquals($test_cart, $result);
        }

        function testAddProduct()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_cost = number_format(89.00, 2);
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_cost, $autoship);
            $test_cart->save();

            $name2 = "45 lb. keg";
            $price2 = 39.50;
            $test_product2 = new Product($name2, $price2);
            $test_product2->save();

            // Act
            $test_cart->addProduct($test_product2);

            // Assert
            $this->assertEquals([$test_product2], $test_cart->getProducts());
        }

        function testGetProducts()
        {
            // Arrange
            $order_date = date('Y-m-d', time());
            $order_cost = number_format(89.00, 2);
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_cost, $autoship);
            $test_cart->save();

            $name = "55 lb. keg";
            $price = number_format(49.50);
            $test_product = new Product($name, $price);
            $test_product->save();

            $name2 = "45 lb. keg";
            $price2 = number_format(39.50);
            $test_product2 = new Product($name2, $price2);
            $test_product2->save();

            // Act
            $test_cart->addProduct($test_product);
            $test_cart->addProduct($test_product2);


            // Assert
            $this->assertEquals([$test_product, $test_product2], $test_cart->getProducts());
        }
    }
