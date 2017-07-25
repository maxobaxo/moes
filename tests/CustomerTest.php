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
            $phone = '5039890787';
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
            $phone = '5039834852';
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
            $phone = '5839890787';
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
            $phone = '50398348245';
            $email = "Sunchaser@sunstreamdream.biz";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $new_business = "Shaz";

            $test_customer->setBusiness($new_business);
            $result = $test_customer->getBusiness();

            $this->assertEquals($new_business, $result);
        }

        function testGetAddress()
        {
            //Arrange
            $contact = "Alekx";
            $business = "SunMoon";
            $address = "2500 SW Monumental Ave";
            $phone = '5839890787';
            $email = "Noprogress.biz";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            //Act
            $result = $test_customer->getAddress();
            //Assert
            $this->assertEquals($address, $result);
        }

        function testSetAddress()
        {
            $contact = "Saukl";
            $business = "DumbMonkey";
            $address = "2500 NE Tanal Ave";
            $phone = '50398348245';
            $email = "Sunchaser@sunstreamdream.biz";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $new_address = "23423 Jawasz";

            $test_customer->setAddress($new_address);
            $result = $test_customer->getAddress();

            $this->assertEquals($new_address, $result);
        }

        function testGetPhone()
        {
            //Arrange
            $contact = "Alekx";
            $business = "SunMoon";
            $address = "2500 SW Monumental Ave";
            $phone = '5839890787';
            $email = "Noprogress.biz";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            //Act
            $result = $test_customer->getPhone();
            //Assert
            $this->assertEquals($phone, $result);
        }

        function testSetPhone()
        {
            $contact = "Saukl";
            $business = "DumbMonkey";
            $address = "2500 NE Tanal Ave";
            $phone = '50398348245';
            $email = "Sunchaser@sunstreamdream.biz";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $new_phone = '1234567890';

            $test_customer->setPhone($new_phone);
            $result = $test_customer->getPhone();

            $this->assertEquals($new_phone, $result);
        }

        function testGetEmail()
        {
            //Arrange
            $contact = "Alekx";
            $business = "SunMoon";
            $address = "2500 SW Monumental Ave";
            $phone = '5839890787';
            $email = "Noprogress.biz";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            //Act
            $result = $test_customer->getEmail();
            //Assert
            $this->assertEquals($email, $result);
        }

        function testSetEmail()
        {
            $contact = "Saukl";
            $business = "DumbMonkey";
            $address = "2500 NE Tanal Ave";
            $phone = '50398348245';
            $email = "Sunchaser@sunstreamdream.biz";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $new_email = "Shaz@shazatazz.com";

            $test_customer->setEmail($new_email);
            $result = $test_customer->getEmail();

            $this->assertEquals($new_email, $result);
        }

        function testGetId()
        {
            $contact = "Saupl";
            $business = "ThumbMonkey";
            $address = "2555 NE Tanal Ave";
            $phone = '50394738245';
            $email = "Sunfollower@sunstreamdream.biz";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $test_customer->save();

            $result = $test_customer->getId();

            $this->assertTrue(is_numeric($result));
        }

        function testSave()
        {
            $contact = "Saupl";
            $business = "ThumbMonkey";
            $address = "2555 NE Tanal Ave";
            $phone = '50394738245';
            $email = "Sunfollower@sunstreamdream.biz";
            $test_customerino = new Customer($contact, $business, $address, $phone, $email);
            $executed = $test_customerino->save();
            $this->assertTrue($executed, "Contact not successfully saved to database");
        }
        function testDeleteAll()
        {
            $contact = "Flipper";
            $business = "Flopper";
            $address = "666 weenie bopper";
            $phone = '50338438245';
            $email = "Magicalponies@haskos.edu";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $test_customer->save();
            $contact_2 = "Krang";
            $business_2 = "Kodos";
            $address_2 = "283 Ravens flight";
            $phone_2 = '501238438245';
            $email_2 = "Monkeyflight@frank.com";
            $test_customer_2 = new Customer($contact_2, $business_2, $address_2, $phone_2, $email_2);
            $test_customer_2->save();

            Customer::deleteAll();
            $result = Customer::getAll();

            $this->assertEquals([], $result);
        }
        function testGetAll()
        {
            $contact = "Flipper";
            $business = "Flopper";
            $address = "666 weenie bopper";
            $phone =  '50338438245';
            $email = "Magicalponies@haskos.edu";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $test_customer->save();

            $contact_2 = "Krang";
            $business_2 = "Kodos";
            $address_2 = "283 Ravens flight";
            $phone_2 =  '501238438245';
            $email_2 = "Monkeyflight@frank.com";
            $test_customer_2 = new Customer($contact_2, $business_2, $address_2, $phone_2, $email_2);
            $test_customer_2->save();

            $result = Customer::getAll();

            $this->assertEquals([$test_customer, $test_customer_2], $result);
        }

        function testFind()
        {
            $contact = "Lisa";
            $business = "Simpsons";
            $address = "666 Flanders";
            $phone =  '5394438245';
            $email = "Magicashmeee@jesu.edu";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $test_customer->save();

            $contact_2 = "Blergh";
            $business_2 = "Blarmo";
            $address_2 = "283 Raver fall";
            $phone_2 =  '501238427845';
            $email_2 = "Mkendo@frank.com";
            $test_customer_2 = new Customer($contact_2, $business_2, $address_2, $phone_2, $email_2);
            $test_customer_2->save();

            $result = Customer::find($test_customer->getId());
            $this->assertEquals($test_customer, $result);
        }

        function testUpdateContact()
        {
            $contact = "Loso";
            $business = "Plambo";
            $address = "1826 Flanders";
            $phone =  '51235245';
            $email = "Maacesadeee@jesu.edu";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $test_customer->save();
            $new_contact = "Sneaks";

            $test_customer->updateContact($new_contact);
            $this->assertEquals("Sneaks", $test_customer->getContact());
        }

        function testUpdateBusiness()
        {
            $contact = "Loso";
            $business = "Plambo";
            $address = "1826 Flanders";
            $phone =  '51235245';
            $email = "Maacesadeee@jesu.edu";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $test_customer->save();
            $new_business = "Sneaks";

            $test_customer->updateBusiness($new_business);
            $this->assertEquals("Sneaks", $test_customer->getBusiness());
        }

        function testUpdateAddress()
        {
            $contact = "Loso";
            $business = "Plambo";
            $address = "1826 Flanders";
            $phone =  '51235245';
            $email = "Maacesadeee@jesu.edu";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $test_customer->save();
            $new_address = "Sneaksy place";

            $test_customer->updateAddress($new_address);
            $this->assertEquals("Sneaksy place", $test_customer->getAddress());
        }

        function testUpdatePhone()
        {
            $contact = "Loso";
            $business = "Plambo";
            $address = "1826 Flanders";
            $phone =  '51235245';
            $email = "Maacesadeee@jesu.edu";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $test_customer->save();
            $new_phone = "8675 Sneaks 09";

            $test_customer->updatePhone($new_phone);
            $this->assertEquals($new_phone, $test_customer->getPhone());
        }

        function testUpdateEmail()
        {
            $contact = "Loso";
            $business = "Plambo";
            $address = "1826 Flanders";
            $phone =  '51235245';
            $email = "Maacesadeee@jesu.edu";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $test_customer->save();
            $new_email = "Sneaks@sneaksy.snek";

            $test_customer->updateEmail($new_email);
            $this->assertEquals("Sneaks@sneaksy.snek", $test_customer->getEmail());
        }

        function testGetCart()
        {
            //Arrange
            $contact = "Bob";
            $business = "Bobs Burgers";
            $address = "12 nw";
            $phone = "555-5555";
            $email = "bob@bobs.com";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $test_customer->save();

            $order_date = "2011-02-02";
            $order_number = "12";
            $order_cost = "1.00";
            $autoship = 0;
            $test_cart = new Cart($order_date, $order_number,
            $order_cost, $autoship);
            $test_cart->save();

            $order_date_2 = "2012-03-03";
            $order_number_2 = "13";
            $order_cost_2 = "2.00";
            $autoship_2 = 0;
            $test_cart_2 = new Cart($order_date_2, $order_number_2, $order_cost_2, $autoship_2);
            $test_cart_2->save();

            //Act
            $test_customer->addCart($test_cart);
            $test_customer->addCart($test_cart_2);

            //Assert
            $result = $test_customer->getCarts();
            $this->assertEquals([$test_cart, $test_cart_2], $result);
        }

        function testDelete()
        {
            $contact = "Lisa";
            $business = "Simpsons";
            $address = "666 Flanders";
            $phone =  '5394438245';
            $email = "Magicashmeee@jesu.edu";
            $test_customer = new Customer($contact, $business, $address, $phone, $email);
            $test_customer->save();

            $contact_2 = "Blergh";
            $business_2 = "Blarmo";
            $address_2 = "283 Raver fall";
            $phone_2 =  '501238427845';
            $email_2 = "Mkendo@frank.com";
            $test_customer_2 = new Customer($contact_2, $business_2, $address_2, $phone_2, $email_2);
            $test_customer_2->save();

            $test_customer->delete();

            $result = Customer::getAll();
            $this->assertEquals([$test_customer_2], $result);
        }

    }
?>
