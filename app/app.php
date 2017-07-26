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

    // $app->post("/register", function() use ($app) {
    //     $warning = false;
    //     $current_user = false;
    //     $carts = false;
    //     if (!(empty($current_user))) {
    //         $carts = $current_user->getCarts();
    //     }
    //     return $app['twig']->render('customer_home.html.twig', array('current_user' => $current_user, 'warning' => $warning, 'carts' => $carts));
    // });

    // $app->get("/login", function() use ($app) {
    //     $warning = false;
    //     $current_user = false;
    //     $carts = false;
    //     if (!(empty($current_user))) {
    //         $carts = $current_user->getCarts();
    //     }
    //     return $app['twig']->render('customer_home.html.twig', array('current_user' => $current_user, 'warning' => $warning, 'carts' => $carts));
    // });

    $app->post("/customers", function() use ($app) {
        $contact = $_POST['customer_contact'];
        $business = $_POST['business_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $new_customer = new Customer($contact, $business, $address, $phone, $email, $login, $password);

        $warning = false;
        if ($new_customer->save() == false)
        {
            $warning = "Error: Login already in use. New customer not saved! ";
        }
        $current_user = Customer::find($new_customer->getID());

        return $app['twig']->render('customer_home.html.twig', array('current_user' => $current_user, 'warning' => $warning));
    });

    $app->patch("/user_edit/{id}", function($id) use ($app) {
        $current_user = Customer::find($id);
        if(!empty($_POST['business_update']))
        {
            $current_user->updateBusiness($_POST['business_update']);
        }
        if(!empty($_POST['contact_update']))
        {
            $current_user->updateContact($_POST['contact_update']);
        }
        if(!empty($_POST['address_update']))
        {
            $current_user->updateAddress($_POST['address_update']);
        }
        if(!empty($_POST['phone_update']))
        {
            $current_user->updatePhone($_POST['phone_update']);
        }
        if(!empty($_POST['email_update']))
        {
            $current_user->updateEmail($_POST['email_update']);
        }
        $warning = false;
        return $app['twig']->render('customer_home.html.twig', array('current_user' => $current_user, 'warning' => $warning));
    });

    $app->get("/product_order", function() use ($app) {
        return $app['twig']->render('store.html.twig', array('products' => Product::getAll()));
    });

    $app->post("/product_order", function() use ($app) {
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $product = new Product($name, $price);
        $product->save();
        return $app['twig']->render('store.html.twig', array('products' => Product::getAll(), 'product' => $product));
    });

    return $app
?>
