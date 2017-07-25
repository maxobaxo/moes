<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cart.php";
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
        $new_customer = false;
        $warning = false;
        return $app['twig']->render('customer_home.html.twig', array('current_user' => $new_customer, 'warning' => $warning));
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

    $app->post("/login", function() use ($app) {
        $contact = 'steve';
        $business = 'steve';
        $address = 'steve';
        $phone = 'steve';
        $email = 'steve';
        $login = $_POST['existing_login'];
        $password = $_POST['existing_password'];
        $login_customer = new Customer($contact, $business, $address, $phone, $email, $login, $password);
        $current_user = $login_customer->loginCheck();
        $warning = false;
        if ($current_user == false)
        {
            $warning = "Login failed; login/password combination incorrect";
        }
        return $app['twig']->render('customer_home.html.twig', array('current_user' => $current_user, 'warning' => $warning));
    });

    return $app
?>
