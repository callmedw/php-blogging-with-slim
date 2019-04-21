<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;
$app->get('index.php', function (Request $request, Response $response, array $args) {
  $response->getBody();
  return $response;
});

// $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
//     $name = r
//     $response->getBody()->write("Hello, $name");
//
//     return $response;
// });
$app->run();
