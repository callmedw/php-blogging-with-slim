<?php

use Slim\App;

return function (App $app) {
  $container = $app->getContainer();

  // view - point to twig template directory for rendering views
  $container['view'] = function ($c) {
    $view = new \Slim\Views\Twig(__DIR__ .'/../templates/', [
        'cache' => false
    ]);
    $router = $c->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new Slim\Views\TwigExtension($router, $uri));
    return $view;
  };

  // monolog
  $container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new \Monolog\Logger($settings['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
  };

  // connect to database
  $container['db'] = function($c) {
    $db = $c->get('settings')['db'];
    $pdo = new PDO($db['dsn'].':'.$db['database']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  };

  // register flash
  $container['flash'] = function () {
    return new \Slim\Flash\Messages();
  };

  // load classes
  $container['comment'] = function($c) {
    return new Comment();
  };

  $container['entry'] = function($c) {
    return new Entry();
  };
};
