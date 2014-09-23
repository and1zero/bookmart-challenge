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

$app->get('/books',function() use($app){
    $q = $app['pdo']->prepare("SELECT * FROM books");
    $q->execute();

    $books = array();
    while($row = $q->fetch(PDO::FETCH_ASSOC)){
        $books[] = $row;
    }
    return $app['twig']->render('books.html',array(
        'title' => 'Browse Books'
    ));
});

$app->get('/public/{file}', function ($file) use ($app) {
    if(!file_exists(__DIR__.'/public/'.$file)){
        $file = 'public/missing.png';
    }
    $stream = function () use ($file) {
        readfile($file);
    };

    return $app->stream($stream, 200, array('Content-Type' => 'image/png'));
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
