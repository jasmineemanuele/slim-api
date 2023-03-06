<?php

namespace App\Controllers;

use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Article {
     
    public function getArticle(Request $request, Response $response){

        $article = new \App\Models\Articles;

        $renderer = new PhpRenderer(__DIR__."\Views");

        $result = $article->getArticles();

        
        //Ritorno risposta db traminte la View PhpRender
        $args =  ["articles" => $result, "title" => "I Miei Articoli"];
        
        return $renderer->render($response, "ViewArticle.php", $args);


    }
//funzione aggiornamento record ;
public function updateArticle(Request $request, Response $response, array $args)
{
    $id = $args['id'];
    $article = new \App\Models\Articles();
    $result = $article->getArticlebyId($id);
    $dd =  ["articoli" => $result, "title" => "Articoli"];
    $renderer = new PhpRenderer(__DIR__ . "\Views");
    return $renderer->render($response, "ViewUpdateArticoli.php" , $dd);
   
}


public function postupdateArticle(Request $request, Response $response)
{

    $article_model = new \App\Models\Articles();
    $params = (array)$request->getParsedBody();
    $article_name = $params['nome'];
    $descrizione = $params['descrizione'];
    $id = $params['id'];
    $giacenza = $params['giacenza'];


    $result = $article_model->updateArticles($article_name, $descrizione , $id,$giacenza);
    
    $response->getBody()->write("<script>location.replace('http://localhost:8080/articoli')</script>");
    return($response);
    //return $response->withHeader('Location', 'http://localhost:8080/update_citta');

    
}








}