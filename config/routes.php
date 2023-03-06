<?php

use Slim\App;
use Slim\Views\PhpRenderer;

return function (App $app) {
    // $app->get('/', \App\Action\HomeAction::class);
	// $app->get('/home', \App\Controllers\Home::class . ':index');
	// $app->get('/welcome', \App\Controllers\Home::class . ':getUser');
	// $app->get('/users', \App\Controllers\Home::class . ':getUser');



//Rotte per le tabelle DB
	$app->get('/ordini', \App\Controllers\Order::class . ':getOrder');
	$app->get('/articoli', \App\Controllers\Article::class . ':getArticle');
	$app->get('/categorie', \App\Controllers\Category::class . ':ok');
	$app->get('/demo',\App\Controllers\Demo::class . ':test');



//Rotte per la View PHPrenderer
	$app->get('/home', function ($request, $response, $args) {
		$renderer = new PhpRenderer(__DIR__.'/../src/Views');
		return $renderer->render($response, "hello.php", $args);
	});



//Rotta per le funzioni collagate al DB TABELLA CITTA
$app->get('/citta',\App\Controllers\City::class . ':getCity')->setName('citta');
$app->get('/crea_citta',\App\Controllers\City::class . ':getInsertCity');
$app->post('/crea_citta',\App\Controllers\City::class . ':postIinsertCity');

$app->get('/scarica_citta',\App\Controllers\City::class . ':downloadCity');

$app->get('/update_citta/{id}',\App\Controllers\City::class . ':updateCity');
$app->post('/update_citta/{id}',\App\Controllers\City::class . ':postupdateCity');

$app->get('/delete_citta/{id}',\App\Controllers\City::class . ':getDeleteCity');


//Rotta per registrazione, login e logout
$app->get('/registrazione',\App\Controllers\User::class . ':getRegister');
$app->post('/registrazione',\App\Controllers\User::class .':postRegister');


$app->get('/login',\App\Controllers\User::class . ':getLogin');
$app->post('/login',\App\Controllers\User::class . ':postLogin');

$app->get('/logout',\App\Controllers\User::class . ':getLogout');


//Rotta per le funzioni collagate al DB Tabella ORDINI

$app->get('/crea_ordini',\App\Controllers\Order::class . ':getInsertOrder');
$app->post('/crea_ordini',\App\Controllers\Order::class . ':postIinsertOrder');


$app->get('/scarica_ordini',\App\Controllers\Order::class . ':downloadOrder');

$app->get('/update_ordini/{id}',\App\Controllers\Order::class . ':updateOrder');
$app->post('/update_ordini/{id}',\App\Controllers\Order::class . ':postupdateOrder');

$app->get('/delete_ordini/{id}',\App\Controllers\Order::class . ':getDeleteOrder');
// SQLSTATE[HY093]: Invalid parameter number: number of bound variables does
//  not match number of tokens trova questo problema;


//Rotta per le funzioni collagate al DB Tabella CATEGORY
$app->get('/crea_categorie',\App\Controllers\Category::class . ':getInsertCategory');
$app->post('/crea_categorie',\App\Controllers\Category::class . ':postIinsertCategory');


$app->get('/scarica_categorie',\App\Controllers\Category::class . ':downloadCategory');

$app->get('/update_categorie/{id}',\App\Controllers\Category::class . ':updateCategory');
$app->post('/update_categorie/{id}',\App\Controllers\Category::class . ':postupdateCategory');

$app->get('/delete_categorie/{id}',\App\Controllers\Category::class . ':getDeleteCategory');


//Rotta per le funzioni collagate al DB TABELLA ARTICOLO
$app->get('/crea_articoli',\App\Controllers\Article::class . ':getInsertArticle');
$app->post('/crea_articoli',\App\Controllers\Article::class . ':postIinsertArticle');

$app->get('/scarica_articoli',\App\Controllers\Article::class . ':downloadArticle');

$app->get('/update_articoli/{id}',\App\Controllers\Article::class . ':updateArticle');
$app->post('/update_articoli/{id}',\App\Controllers\Article::class . ':postupdateArticles');

$app->get('/delete_articoli/{id}',\App\Controllers\Article::class . ':getDeleteArticle');

};
