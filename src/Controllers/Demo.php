<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class Demo extends Controller
{
    public function test(Request $request, Response $response){

        //return $this->container->render($response, "hello.php");
        $view->render($response, "hello.php");
        //$view = $this->container->get(PhpRenderer::class);
        //$view->render($response, "C:\\Users\\39327\\Desktop\\slim\\src\\Views\\hello.php");
        //return $renderer->render($response, "hello.php");
    }
}