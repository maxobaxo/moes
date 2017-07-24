<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Customer.php";

    $server = 'mysql:host=localhost:8889;dbname=moes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);
    class CustomerTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Customer::deleteAll();

        }
        function testGetContact()
        {
            //Arrange
            $contact = "Alex";
            $business = "SunStream";
            $address = "2500 SW Marginal Ave";
            $phone = 5039890787;
            $email = "Sunstreamer@sunstreamdream.biz";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            //Act
            $result = $test_customer->getContact();
            //Assert
            $this->assertEquals($contact, $result);
        }
        function testSetContact()
        {
            $contact = "Saul";
            $business = "SunMonkey";
            $address = "2500 NE Marginal Ave";
            $phone = 5039834852;
            $email = "Sundreamer@sunstreamdream.biz";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $new_contact = "Shaz";

            $test_customer->setContact($new_contact);
            $result = $test_customer->getContact();

            $this->assertEquals($new_contact, $result);
        }

        function testGetBusiness()
        {
            //Arrange
            $contact = "Alekx";
            $business = "SunMoon";
            $address = "2500 SW Monumental Ave";
            $phone = 5839890787;
            $email = "Noprogress.biz";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            //Act
            $result = $test_customer->getBusiness();
            //Assert
            $this->assertEquals($business, $result);
        }

        function testSetBusiness()
        {
            $contact = "Saukl";
            $business = "DumbMonkey";
            $address = "2500 NE Tanal Ave";
            $phone = 50398348245;
            $email = "Sunchaser@sunstreamdream.biz";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $new_business = "Shaz";

            $test_customer->setBusiness($new_business);
            $result = $test_customer->getBusiness();

            $this->assertEquals($new_business, $result);
        }


        // function testGetPrice()
        // {
        //     $brand = "Nike";
        //     $price = "666";
        //     $test_shoe = new Shoe($brand, $price);
        //     $result = $test_shoe->getPrice();
        //     $this->assertEquals($price, $result);
        // }
        // function testSetNumber()
        // {
        //     $brand = "Bans";
        //     $price = "39";
        //     $test_shoe = new Shoe($brand, $price);
        //     $new_price = "Jo Boi Day";
        //     $test_shoe->setPrice($new_price);
        //     $result = $test_shoe->getPrice();
        //     $this->assertEquals($new_price, $result);
        // }
        // function testGetId()
        // {
        //     $brand = "Converse";
        //     $price = "34";
        //     $test_shoe = new Shoe($brand, $price);
        //     $test_shoe->save();
        //     $result = $test_shoe->getId();
        //     $this->assertTrue(is_numeric($result));
        // }
        // function testSave()
        // {
        //     $brand = "Kiks";
        //     $price = "78";
        //     $test_shoe = new Shoe($brand, $price);
        //     $test_shoe->save();
        //     $executed = $test_shoe->save();
        //     $this->assertTrue($executed, "Brand not successfully saved to database");
        // }
        // function testGetAll()
        // {
        //     $brand = "Flippers";
        //     $brand_2 = "Floppers";
        //     $price = "23";
        //     $price_2 = "32";
        //     $test_shoe = new Shoe($brand, $price);
        //     $test_shoe->save();
        //     $test_shoe_2 = new Shoe($brand_2, $price_2);
        //     $test_shoe_2->save();
        //     $result = Shoe::getAll();
        //     $this->assertEquals([$test_shoe, $test_shoe_2], $result);
        // }
        // function testDeleteAll()
        // {
        //     $brand = "Flippers";
        //     $brand_2 = "Floppers";
        //     $price = "23";
        //     $price_2 = "32";
        //     $test_shoe = new Shoe($brand, $price);
        //     $test_shoe->save();
        //     $test_shoe_2 = new Shoe($brand_2, $price_2);
        //     $test_shoe_2->save();
        //     Shoe::deleteAll();
        //     $result = Shoe::getAll();
        //     $this->assertEquals([], $result);
        // }
        // function testFind()
        // {
        //     $brand = "Grrrkiks";
        //     $brand_2 = "MeowKicks";
        //     $price = "24";
        //     $price_2 = "34";
        //     $test_shoe = new Shoe($brand, $price);
        //     $test_shoe->save();
        //     $test_shoe_2 = new Shoe($brand_2, $price_2);
        //     $test_shoe_2->save();
        //     $result = Shoe::find($test_shoe->getId());
        //     $this->assertEquals($test_shoe, $result);
        // }
        // function testUpdate()
        // {
        //     $brand = "Gym";
        //     $price = "101";
        //     $test_brand = new Shoe($brand, $price);
        //     $test_brand->save();
        //     $new_brand = "Sneaks";
        //     $test_brand->update($new_brand);
        //     $this->assertEquals("Sneaks", $test_brand->getBrand());
        // }
        // function testAddStore()
        // {
        //     $store = "New Seasons";
        //     $test_store = new Store($store);
        //     $test_store->save();
        //     $brand = "ana tomic";
        //     $price = "88";
        //     $test_brand = new Shoe($brand, $price);
        //     $test_brand->save();
        //     $test_brand->addStore($test_store);
        //     $this->assertEquals($test_brand->getStores(), [$test_store]);
        // }
        // function testGetStores()
        // {
        //     $store = "Boblob";
        //     $test_store = new Store($store);
        //     $test_store->save();
        //     $store2 = "Lora";
        //     $test_store2 = new Store($store2);
        //     $test_store2->save();
        //     $brand = "anatomy";
        //     $price = "888";
        //     $test_brand = new Shoe($brand, $price);
        //     $test_brand->save();
        //     $test_brand->addStore($test_store);
        //     $test_brand->addStore($test_store2);
        //     $this->assertEquals($test_brand->getStores(), [$test_store, $test_store2]);
        // }
    }
?>
