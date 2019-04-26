<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once __DIR__ . '/../../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../templates/');
$twig = new \Twig\Environment($loader);
echo $twig->render('index.twig', ['name' => 'Dana']);
// $app = new \Slim\App;
// $app->get('/', function () {
//   echo "Hello World";
// });
// $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
//     $name = $args['name'];
//     $response->getBody()->write("Hello, $name");
//
//     return $response;
// });
// $app->run();
