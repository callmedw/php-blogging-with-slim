<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;


return function (App $app, $twig) {
  $container = $app->getContainer();

  $app->get('/', function (Request $request, Response $response, array $args) use ($container, $twig) {
    $container->get('logger')->info("Slim-Skeleton '/' route");
    $db = $container->get('db');
    $args['entries'] = $this->entry->getEntryList($db);
    return $twig->render('index.twig', $args);
  });

  $app->get('/entries/{id}', function (Request $request, Response $response, array $args) use ($container, $twig) {
    $entry_id = $request->getAttribute('id');
    $container->get('logger')->info("Slim-Skeleton '/entries/{entry_id}' route");
    $db = $container->get('db');
    $args['entry'] = $this->entry->getEntry($db, $entry_id);
    return $twig->render('detail.twig', $args);
  });
};


$app->get('/blog/{id}', function (Request $request, Response $response, array $args) use ($container) {
        $container->get('logger')->info("Slim-Skeleton '/' route");
        $id = $request->getAttribute('id');
        $db = $container->get('db');
        $args['posts'] = $this->entry->getEntries($db,$id);
        $args['comments'] = $this->comment->displayComments($db,$id);
        return $container->get('renderer')->render($response, 'detail.phtml', $args);
    }
);
