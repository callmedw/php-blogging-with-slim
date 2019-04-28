<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;


return function (App $app, $twig) {
  $container = $app->getContainer();

  $app->get('/', function (Request $request, Response $response, array $args) use ($container, $twig) {

    $container->get('logger')->info("Slim-Skeleton '/' route");
    $db = $container->get('db');
    $args['posts'] = $this->entry->get_entry_list($db);

    return $twig->render('index.twig');
  });
};
