<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Customer.php";
    require_once __DIR__."/../src/Cart.php";
    require_once __DIR__."/../src/Product.php";
    $server = 'mysql:host=localhost:8889;dbname=moes';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app['debug'] = true;

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get("/", function() use ($app) {
        $cart = new Cart("2017-07-25", 723, number_format(55.50, 2), 0);
        $cart->save();
        return $app['twig']->render('index.html.twig', array('cart' => $cart, 'cart_products' => $cart->getProducts()));
    });

    $app->post("/add_customer", function() use ($app) {
        $contact = $_POST['customer_contact'];
        $business = $_POST['business_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $new_customer = new Customer($contact, $business, $address, $phone, $email);
        $new_customer->save();
        $id = $new_customer->getId();
        return $app['twig']->render('customer_home.html.twig', array( 'current_user' => $new_customer));
    });

    $app->patch("/user_edit/{id}", function($id) use ($app) {
        $current_customer = Customer::find($id);
        if(!empty($_POST['business_update']))
        {
            $current_customer->updateBusiness($_POST['business_update']);
        }
        if(!empty($_POST['contact_update']))
        {
            $current_customer->updateContact($_POST['contact_update']);
        }
        if(!empty($_POST['address_update']))
        {
            $current_customer->updateAddress($_POST['address_update']);
        }
        if(!empty($_POST['phone_update']))
        {
            $current_customer->updatePhone($_POST['phone_update']);
        }
        if(!empty($_POST['email_update']))
        {
            $current_customer->updateEmail($_POST['email_update']);
        }
        return $app['twig']->render('customer_home.html.twig', array('current_user' => $current_customer));
    });

    return $app
?>
