<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
  $container = $app->getContainer();

  // $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
  //   // Sample log message
  //   $container->get('logger')->info("Slim-Skeleton '/' route");
  //
  //   // Render index view
  //   return $this->view->render($response, 'index.php', $args);
  // });
  //
  // // GET
  // $app->get('/books/{id}', function ($request, $response, $args) {
  //   // Show book identified by $args['id']
  // });
  //
  // // POST
  // $app->post('/books', function ($request, $response, $args) {
  //   // Create new book
  // });
  //
  // // PUT
  // $app->put('/books/{id}', function ($request, $response, $args) {
  //   // Update book identified by $args['id']
  // });
  //
  // // DELETE
  // $app->delete('/books/{id}', function ($request, $response, $args) {
  //   // Delete book identified by $args['id']
  // });





};
