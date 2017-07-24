<?php
    /**
    *@backupGlobals disabled
    *@backupStaticAttributes disabled
    */

    require_once 'src/Product.php';

    $server = 'mysql:host=localhost:8889;dbname=moes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ProductTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Product::deleteAll();
        }

        function testGetName()
        {
            // Arrange
            $name = "55 lb. keg";
            $price = 49.50;
            $test_product = new Product($name, $price);

            // Act
            $result = $test_product->getName();

            // Assert
            $this->assertEquals($name, $result);
        }

        function testSetName()
        {
            // Arrange
            $name = "55 lb. keg";
            $price = 49.50;
            $test_product = new Product($name, $price);

            $new_name = "45 lb. keg";

            // Act
            $test_product->setName($new_name);
            $result = $test_product->getName();

            // Assert
            $this->assertEquals($new_name, $result);
        }

        // function testGetPrice()
        // {
        //     // Arrange
        //     $name = "55 lb. keg";
        //     $price = 49.50;
        //     $test_product = new Product($name, $price);
        //
        //     // Act
        //     $result = $test_product->getPrice();
        //
        //     // Assert
        //     $this->assertEquals($price, $result);
        // }
        //
        // function testSetPrice()
        // {
        //     // Arrange
        //     $name = "55 lb. keg";
        //     $price = 49.50;
        //     $test_product = new Product($name, $price);
        //
        //     $new_price = 59.50;
        //
        //     // Act
        //     $test_product->setPrice($new_price);
        //     $result = $test_product->getPrice();
        //
        //     // Assert
        //     $this->assertEquals($new_price, $result);
        //
        // }
        //
        // function testGetID()
        // {
        //     // Arrange
        //     $name = "55 lb. keg";
        //     $price = 49.50;
        //     $test_product = new Product($name, $price);
        //     $test_product->save();
        //
        //     // Act
        //     $result = $test_product->getID();
        //
        //     // Assert
        //     $this->assertTrue(is_numeric($result));
        // }
        //
        // function testSave()
        // {
        //     // Arrange
        //     $name = "55 lb. keg";
        //     $price = 49.50;
        //     $test_product = new Product($name, $price);
        //
        //     // Act
        //     $executed = $test_product->save();
        //
        //     // Assert
        //     $this->assertTrue($executed, 'The product was not saved to the database');
        // }
        //
        // function testDeleteAll()
        // {
        //     // Arrange
        //     $name = "55 lb. keg";
        //     $price = 49.50;
        //     $test_product = new Product($name, $price);
        //     $test_product->save();
        //
        //     $name2 = "45 lb. keg";
        //     $price2 = 39.50;
        //     $test_product2 = new Product($name2, $price2);
        //     $test_product2->save();
        //
        //     // Act
        //     Product::deleteAll();
        //     $result = Product::getAll();
        //
        //     // Assert
        //     $this->assertEquals([], $result);
        // }
        //
        // function testGetAll()
        // {
        //     // Arrange
        //     $name = "55 lb. keg";
        //     $price = 49.50;
        //     $test_product = new Product($name, $price);
        //     $test_product->save();
        //
        //     $name2 = "45 lb. keg";
        //     $price2 = 39.50;
        //     $test_product2 = new Product($name2, $price2);
        //     $test_product2->save();
        //
        //     // Act
        //     $result = Product::getAll();
        //
        //     // Assert
        //     $this->assertEquals([$test_product, $test_product2], $result);
        // }
        //
        // function testDelete()
        // {
        //     // Arrange
        //     $name = "55 lb. keg";
        //     $price = 49.50;
        //     $test_product = new Product($name, $price);
        //     $test_product->save();
        //
        //     $name2 = "45 lb. keg";
        //     $price2 = 39.50;
        //     $test_product2 = new Product($name2, $price2);
        //     $test_product2->save();
        //
        //     // Act
        //     $test_product2->delete();
        //
        //     // Assert
        //     $this->assertEquals([$test_product], Product::getAll());
        // }
        //
        // function testUpdateName()
        // {
        //     // Arrange
        //     $name = "55 lb. keg";
        //     $price = 49.50;
        //     $test_product = new Product($name, $price);
        //     $test_product->save();
        //
        //     $new_name = "45 lb. keg";
        //
        //     // Act
        //     $test_product->updateName($new_name);
        //     $result = $test_product->getName();
        //
        //     // Assert
        //     $this->assertEquals($new_name, $result);
        // }
        //
        // function testUpdatePrice()
        // {
        //     // Arrange
        //     $name = "55 lb. keg";
        //     $price = 49.50;
        //     $test_product = new Product($name, $price);
        //     $test_product->save();
        //
        //     $new_price = 59.50;
        //
        //     // Act
        //     $test_product->updatePrice($new_price);
        //     $result = $test_product->getPrice();
        //
        //     // Assert
        //     $this->assertEquals($new_price, $result);
        // }
        //
        // function testFindByID()
        // {
        //     // Arrange
        //     $name = "55 lb. keg";
        //     $price = 49.50;
        //     $test_product = new Product($name, $price);
        //     $test_product->save();
        //
        //     $name2 = "45 lb. keg";
        //     $price2 = 39.50;
        //     $test_product2 = new Product($name2, $price2);
        //     $test_product2->save();
        //
        //     // Act
        //     $result = Product::findByID($test_product->getID());
        //
        //     // Assert
        //     $this->assertEquals($test_product, $result);
        // }
        //
        // function testFindByName()
        // {
        //     // Arrange
        //     $name = "55 lb. keg";
        //     $price = 49.50;
        //     $test_product = new Product($name, $price);
        //     $test_product->save();
        //
        //     $name2 = "45 lb. keg";
        //     $price2 = 39.50;
        //     $test_product2 = new Product($name2, $price2);
        //     $test_product2->save();
        //
        //     // Act
        //     $result = Product::findByName($test_product->getName());
        //
        //     // Assert
        //     $this->assertEquals($test_product, $result);
        // }
    }
