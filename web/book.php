<?php

$book = $app['controllers_factory'];
$book->match('/',function() use($app){
    $q = $app['pdo']->prepare("SELECT * FROM books");
    $q->execute();

    $books = array();
    while($row = $q->fetch(PDO::FETCH_ASSOC)){
        $books[] = $row;
    }
    return $app['twig']->render('books.html',array(
        'title' => 'Browse Books',
        'books' => $books
    ));
});
$book->match('/add/{id}',function($id) use($app){
    $cart = $app['session']->get('cart');
    $q = $app['pdo']->prepare("SELECT * FROM books");
    $q->execute();

    $books = array();
    while($row = $q->fetch(PDO::FETCH_ASSOC)){
        $books[] = $row;
    }
    if($cart[$id]){
        $cart[$id]+=1;
    }else{
        $cart[$id] = 1;
    }
    $total = 0;
    foreach($cart as $id => $quantity){
        if($id !== 'total'){
            $total += $books[$id] * $quantity;
        }
    }
    $cart['total'] = $total;
    $app['session']->set('cart',$cart);
    $app->redirect('/');
});
return $book;
?>
