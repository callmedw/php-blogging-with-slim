<?php
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app, $twig) {
  $container = $app->getContainer();
  $database = $container->get('db');

  $app->get('/', function (Request $request, Response $response, array $args) use ($container, $database) {
    $container->get('logger')->info("Slim-Skeleton '/' route");
    $args['entries'] = $this->entry->getEntryList($database);
    return $this->view->render($response, 'index.twig', $args);
  });

  $app->get('/entries/{id}', function (Request $request, Response $response, array $args) use ($container, $database) {
    $entry_id = $request->getAttribute('id');
    $container->get('logger')->info("Slim-Skeleton '/entries/{$entry_id}' route");
    $args['entry'] = $this->entry->getEntry($database, $entry_id);
    return $this->view->render($response, 'detail.twig', $args);
  });

  $app->get('/new', function (Request $request, Response $response, array $args) use ($container) {
    $container->get('logger')->info("Slim-Skeleton '/new' route");
    return $this->view->render($response, 'new.twig', $args);
    }
  );
};
