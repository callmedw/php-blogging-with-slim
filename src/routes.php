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
  })->setName("index");

  $app->get('/entries/new', function (Request $request, Response $response, array $args) use ($container, $database) {
    return $this->view->render($response, 'new.twig', $args);
    }
  )->setName("new");

  $app->get('/entries/{id}/edit', function (Request $request, Response $response, array $args) use ($container, $database) {
    $entry_id = $request->getAttribute('id');
    $args['entry'] = $this->entry->getEntry($database, $entry_id);
    return $this->view->render($response, 'edit.twig', $args);
    }
  )->setName("edit");

  $app->get('/entries/{id}', function (Request $request, Response $response, array $args) use ($container, $database) {
    $entry_id = $request->getAttribute('id');
    $args['entry'] = $this->entry->getEntry($database, $entry_id);
    return $this->view->render($response, 'detail.twig', $args);
  })->setName("detail");

  $app->post('/entries/{id}/edit', function (Request $request, Response $response, array $args) use ($container, $database) {
    $entry_id = $request->getAttribute('id');
    $params = ['id' => $entry_id];
    $args = array_merge($args, $request->getParsedBody());

    if(!empty($args['title'] && !empty($args['body']))) {
      try {
        $this->entry->addOrUpdateEntry($database, $args['title'], $args['body'], $entry_id);
        $routename = "detail";
        echo "success!!!";
      } catch(Exception $e) {
        $routename = "edit.post";
        echo 'error', $e->getMessage();
      }
      return $response->withRedirect($this->router->pathFor($routename, $params));
    } else {
      echo "please fill out all fields";
      return $response->withRedirect($this->router->pathFor("edit.post", $params));
    }

  })->setName("edit.post");
};
