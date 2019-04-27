<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

  $container = $app->getContainer();

  $app->get('/', function () use ($twig) {
    return $twig->render('index.twig');
  });
