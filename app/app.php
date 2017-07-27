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
        $cart = new Cart(date('Y-m-d', time()), number_format(0.00, 2), 0);
        $cart->save();
        return $app['twig']->render('index.html.twig', array('cart' => $cart, 'cart_products' => $cart->getProducts()));
    });

    $app->post('/', function() use ($app) {
        $cart = Cart::findByID($_POST['cart_id']);
        return $app['twig']->render('index.html.twig', array('cart' => $cart, 'cart_products' => $cart->getProducts()));
    });

    $app->post("/register", function() use ($app) {
        $warning = false;
        $current_user = false;
        $carts = false;
        if (!(empty($current_user))) {
            $carts = $current_user->getCarts();
        }
        return $app['twig']->render('customer_home.html.twig', array('current_user' => $current_user, 'warning' => $warning, 'carts' => $carts));
    });

    $app->get("/login", function() use ($app) {
        $warning = false;
        $current_user = false;
        $carts = false;
        if (!(empty($current_user))) {
            $carts = $current_user->getCarts();
        }
        $cart = new Cart(date('Y-m-d', time()), number_format(0.00, 2), 0);
        $cart->save();
        return $app['twig']->render('customer_home.html.twig', array('current_user' => $current_user, 'warning' => $warning, 'carts' => $carts, 'cart' => $cart));
    });

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

        $cart = new Cart(date('Y-m-d', time()), number_format(0.00, 2), 0);
        $cart->save();

        return $app['twig']->render('customer_home.html.twig', array('current_user' => $current_user, 'warning' => $warning, 'cart' => $cart, 'cart_products' => $cart->getProducts()));
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
        $cart = new Cart(date('Y-m-d', time()), number_format(0.00, 2), 0);
        $cart->save();
        return $app['twig']->render('customer_home.html.twig', array('current_user' => $current_user, 'warning' => $warning, 'cart' => $cart));
    });

    $app->get("/start_order", function() use ($app) {
        return $app['twig']->render('store.html.twig', array('products' => Product::getAll()));
    });

    $app->post("/start_order", function() use ($app) {
        $name = $_POST['product_name'];
        $price = (float)$_POST['product_price'];
        $product = new Product($name, $price);
        $product->save();
        $new_cart = new Cart(date('Y-m-d', time()), number_format(0.00, 2), 0);
        $new_cart->save();
        $new_cart->addProduct($product);
        $cart_total = $new_cart->calculateOrderCost();
        $new_cart->updateOrderCost($cart_total);
        return $app['twig']->render('shopping.html.twig', array('products' => Product::getAll(), 'product' => $product, 'cart' => $new_cart, 'cart_products' => $new_cart->getProducts()));
    });

    $app->patch("/add_to_cart/{id}", function($id) use ($app) {
        $name = $_POST['product_name'];
        $price = (float)$_POST['product_price'];
        $product = new Product($name, $price);
        $product->save();
        $cart = Cart::findByID($id);
        $cart->addProduct($product);
        $cart_total = $cart->calculateOrderCost();
        $cart->updateOrderCost($cart_total);
        return $app['twig']->render('shopping.html.twig', array('products' => Product::getAll(), 'product' => $product, 'cart' => $cart, 'cart_products' => $cart->getProducts()));
    });

    $app->post("/review_order/{id}", function($id) use ($app) {
        // $customer = Customer::find($id);
        $cart = Cart::findByID($id);
        return $app['twig']->render('review_order.html.twig', array('cart' => $cart, 'cart_products' => $cart->getProducts()));
    });

    $app->get("/cart/{id}/edit", function($id) use ($app) {
        $cart = Cart::find($id);
        return $app['twig']->render('review_order.html.twig', array('cart' => $cart));
    });

    $app->patch("/cart/{id}", function($id) use ($app) {
        $cart = Cart::find($id);
        $cart->update($cart);
        return $app['twig']->render('review_order.html.twig', array('carts' => Cart::getAll()));
    });

    $app->delete("/", function() use ($app) {
        $old_cart = Cart::findByID($_POST['cart_id']);
        $old_cart->delete();

        $cart = new Cart(date('Y-m-d', time()), number_format(0.00, 2), 0);
        $cart->save();
        return $app['twig']->render('index.html.twig', array('cart' => $cart, 'cart_products' => $cart->getProducts()));
    });

    $app->post("/order_confirmed", function () use ($app) {
        $cart = Cart::findByID($_POST['cart_id']);

        $cart->setConfirmation(1);

        return $app['twig']->render('review_order.html.twig', array('cart' => $cart, 'cart_products' => $cart->getProducts()));
    });



    return $app
?>
