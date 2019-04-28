<?php
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
  $container = $app->getContainer();
  $database = $container->get('db');

  $app->get('/', function (Request $request, Response $response, array $args) use ($container, $database) {
    $args['entries'] = $this->entry->getEntryList($database);
    return $this->view->render($response, 'index.twig', $args);
  });

  $app->get('/entries/{id}/edit', function (Request $request, Response $response, array $args) use ($container, $database) {
    $entry_id = $request->getAttribute('id');
    $args['entry'] = $this->entry->getEntry($database, $entry_id);
    return $this->view->render($response, 'edit.twig', $args);
    }
  );

  $app->get('/entries/{id}', function (Request $request, Response $response, array $args) use ($container, $database) {
    $entry_id = $request->getAttribute('id');
    $args['entry'] = $this->entry->getEntry($database, $entry_id);
    return $this->view->render($response, 'detail.twig', $args);
  });

  $app->get('entries/new', function (Request $request, Response $response, array $args) use ($container, $database) {
    return $this->view->render($response, 'new.twig', $args);
    }
  );
};
