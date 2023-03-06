<?php

namespace App\Controllers;

use Slim\Views\PhpRenderer;

use Psr\Container\ContainerInterface;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Controller
{
    public $view;

    public function __construct()
    {
        $this->view = 	new PhpRenderer(__DIR__.'/../src/Views');
		
    }

}