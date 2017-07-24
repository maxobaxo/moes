<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    // require_once __DIR__."/../src/Cart.php";
    require_once __DIR__."/../src/Customer.php";
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
        return $app['twig']->render('customer.html.twig', array('customers' => Customer::getAll()));
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

    $app->post("/user_edit", function() use ($app) {
        if(!empty($_POST['business_update']))
        
    })

    return $app
?>
