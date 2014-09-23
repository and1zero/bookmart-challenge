<?php

$book = $app['controllers_factory'];
$book->get('/',function() use($app){
    $q = $app['pdo']->prepare("SELECT * FROM books");
    $q->execute();

    $books = array();
    while($row = $q->fetch(PDO::FETCH_ASSOC)){
        $books[] = $row;
    }
    return $app['twig']->render('books.html',array(
        'title' => 'Browse Books',
		'books' => $books,
		'col' => 3
    ));
});
$book->get('/{id}',function($id) use($app){
    $q = $app['pdo']->prepare("SELECT * FROM books where id=".$id." LIMIT 1");
    $q->execute();

    $books = array();
    while($row = $q->fetch(PDO::FETCH_ASSOC)){
        $books[] = $row;
    }
    return $app['twig']->render('books.html',array(
		'title' => 'Browse Books - '.$books[0]['name'],
		'bookname' => $books[0]['name'],
		'books' => $books,
		'col' => 1
    ));
});
$book->match('/add/{id}',function($id) use($app){
    $cart = $app['session']->get('cart');
    $q = $app['pdo']->prepare("SELECT * FROM books");
    $q->execute();

    $books = array();
    while($row = $q->fetch(PDO::FETCH_ASSOC)){
        $books[$row['id']] = $row;
    }
    if($cart[$id]){
        $cart[$id]+=1;
    }else{
        $cart[$id] = 1;
    }
    $total = 0;
    foreach($cart as $id => $quantity){
        if($id !== 'total'){
            $total += $books[$id]['price'] * $quantity;
        }
    }
    $cart['total'] = $total;
    $app['session']->set('cart',$cart);
     return $app->redirect('/books');
});
return $book;
?>
