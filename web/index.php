<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => 'php://stderr',
));
// Register the Twig templating engine
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));
// Register doctrine database
$dbopts = parse_url(getenv('DATABASE_URL'));
$app->register(new Herrera\Pdo\PdoServiceProvider(),
    array(
        'pdo.dsn' => 'pgsql:dbname='.ltrim($dbopts["path"],'/').';host='.$dbopts["host"],
        'pdo.port' => $dbopts["port"],
        'pdo.username' => $dbopts["user"],
        'pdo.password' => $dbopts["pass"]
    )
);
$app->register(new Silex\Provider\SessionServiceProvider());
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Silex\Provider\FormServiceProvider;
$app->register(new FormServiceProvider());

// Our web handlers

$app->get('/', function() use($app) {
    $app['monolog']->addDebug('logging output.');
    $q = $app['pdo']->prepare("SELECT * FROM books LIMIT 9");
    $q->execute();

    $books = array();
    while($row = $q->fetch(PDO::FETCH_ASSOC)){
        $books[] = $row;
    }
    return $app['twig']->render('home.html', array(
        'title' => "Bookmart - Home",
        'carousel' => array('slider1.png' => '#', 'slider2.png' => '#', 'slider3.png' => '#', 'slider4.png' => '#'),
        'banner' => array('image' => 'banner.png', 'description' => 'Grab a copy of Gillian Flynn\'s global best seller GONE GIRL before its movie adaptation hits the theatres worldwide.', 'link' => '#'),
        'books' => $books
    ));
});
$app->get('/login',function() use($app){
    return $app['twig']->render('account.html',array(
        'title' => 'Bookmart Login',
        'action' => 'login',
        'label' => 'Login'
    ));
});
$app->match('/register',function(Request $request) use($app){
    if($request->getMethod() == 'POST'){
        $data = $request->request->all();
        $q = $app['pdo']->prepare('INSERT INTO users(username,password) VALUES(\''.$data['_username'].'\',\''.$data['_password'].'\')');
        $q->execute();
        return $app->redirect('/');
    }
    return $app['twig']->render('account.html',array(
        'title' => 'Bookmart Register',
        'label' => 'Register'
    ));
});

$app->match('/login',function(Request $request) use($app){
    if($app['session']->get('user')){
        $app->redirect('/');
    }
    if($request->getMethod() == "POST"){
        $data = $request->request->all();
        $q = $app['pdo']->prepare('SELECT * from users where username=\''.$data['_username'].'\' AND password=\''.$data['_password'].'\' LIMIT 1');
        $q->execute();
        if($user = $q->fetch(PDO::FETCH_ASSOC)){
            $app['session']->set('user',array('username' => $user['username']));
        }
    }
    return $app['twig']->render('account.html',array(
        'title' => 'Bookmart Login',
        'label' => 'Login'
    ));
});
$app->match('/logout',function() use($app){
    $app['session']->remove('user');
    return $app->redirect('/');
});

$app->mount('/books',include 'controllers/book.php');

$app->match('/checkout',function(Request $request) use($app){
    if($request->getMethod() == 'POST'){
        $app['session']->remove('cart');
        return $app->redirect('/');
    }
    $cart = $app['session']->get('cart');
    $q = $app['pdo']->prepare("SELECT * FROM books");
    $q->execute();

    $books = array();
    while($row = $q->fetch(PDO::FETCH_ASSOC)){
        $books[$row['id']] = $row;
    }
    return $app['twig']->render('checkout.html',array(
        'title' => 'Checkout',
        'cart' => $cart,
        'books' => $books
    ));
});

// Utilities
$app['twig'] = $app->share($app->extend('twig',function($twig,$app){
    $twig->addFunction(new \Twig_SimpleFunction('asset',function($path){
        return 'assets/'.trim($path);
    }));
    return $twig;
}));

$app->run();

?>
