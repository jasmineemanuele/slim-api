<?php

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

return [
    'settings' => function () {
        return require __DIR__ . '/settings.php';
    },

    'render' => function(){
        return new PhpRenderer();
    },

    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);

        return AppFactory::create();
    },
];