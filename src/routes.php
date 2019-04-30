<?php
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
  $container = $app->getContainer();
  $database = $container->get('db');

//////// ENTRY ROUTES ////////

  //// get - index ///
  $app->get('/', function (Request $request, Response $response, array $args) use ($container, $database) {
    $args['entries'] = $this->entry->getEntryList($database);
    return $this->view->render($response, 'index.twig', $args);
  })->setName("index");

  //// get - new ///
  $app->get('/entries/new', function (Request $request, Response $response, array $args) use ($container, $database) {
    return $this->view->render($response, 'new.twig', $args);
    }
  )->setName("new");

  //// get - edit ///
  $app->get('/entries/{id}/edit', function (Request $request, Response $response, array $args) use ($container, $database) {
    $entry_id = $request->getAttribute('id');
    $args['entry'] = $this->entry->getEntry($database, $entry_id);
    return $this->view->render($response, 'edit.twig', $args);
    }
  )->setName("edit");

  //// get - detail ///
  $app->get('/entries/{id}', function (Request $request, Response $response, array $args) use ($container, $database) {
    $entry_id = $request->getAttribute('id');
    $args['entry'] = $this->entry->getEntry($database, $entry_id);
    $args['comments'] = $this->comment->getEntryComments($database, $entry_id);
    return $this->view->render($response, 'detail.twig', $args);
  })->setName("detail");

  //// post - edit ///
  $app->post('/entries/{id}/edit', function (Request $request, Response $response, array $args) use ($container, $database) {
    $entry_id = $request->getAttribute('id');
    $params = ['id' => $entry_id];
    $args = array_merge($args, $request->getParsedBody());

    // check to make sure all fields are filled out and if yes sanitize the inputs
    if(!empty($args['title'] && !empty($args['body']))) {
      $title = $this->entry->sanitize($args['title']);
      $body = $this->entry->sanitize($args['body']);

      // update - upon success take to the detail page to see changes
      // if not successful take back to the edit page
      try {
        $this->entry->addOrUpdateEntry($database, $title, $body, $entry_id);
        $routename = "detail";
        $this->flash->addMessage('global', "Success! Post has been updated!");
      } catch(Exception $e) {
        $routename = "edit.post";
        $this->flash->addMessage('global', 'Woops! Error' . $e->getMessage());
      }
      return $response->withRedirect($this->router->pathFor($routename, $params));
    } else {
      $this->flash->addMessage('global', "Please fill out all fields");
      return $response->withRedirect($this->router->pathFor("edit.post", $params));
    }

  })->setName("edit.post");

  //// post - new ///
  $app->post('/entries/new', function (Request $request, Response $response, array $args) use ($container, $database) {
    $args = array_merge($args, $request->getParsedBody());

    //check that all fields are filled and if they are sanitize the inputs
    if(!empty($args['title'] && !empty($args['body']))) {
      $container->get('logger')->notice($args['title']);
      $title = $this->entry->sanitize($args['title']);
      $body = $this->entry->sanitize($args['body']);

      // try to add and if successful grab the newly created id and redirect to the detail
      //page for the new entry if not...refresh
      try {
        $entry_id = $this->entry->addOrUpdateEntry($database, $args['title'], $args['body']);
        $entry_id = $this->entry->getLastEntryId($database);
        $params = ['id' => $entry_id];
        $routename = "detail";
        $this->flash->addMessage('global', "Success! Post has been created!");
      } catch(Exception $e) {
        $routename = "new";
        $params = [];
        $this->flash->addMessage('global', 'Woops! Error' .$e->getMessage());
      }
      return $response->withRedirect($this->router->pathFor($routename, $params));
    } else {
      $this->flash->addMessage('global', "Please fill out all fields");
      return $response->withRedirect($this->router->pathFor("new"));
    }

  })->setName("new.post");


  //////// COMMENT ROUTES ////////

    //// post - new ///
    $app->post('/entries/{id}', function (Request $request, Response $response, array $args) use ($container, $database) {
      $args = array_merge($args, $request->getParsedBody());
      $entry_id = $request->getAttribute('id');

      // I used the entry sanitize method here to sanitize the inputs
      if(!empty($args['name'] && !empty($args['body']))) {
        $name = $this->entry->sanitize($args['name']);
        $body = $this->entry->sanitize($args['body']);

        try {
          $this->comment->addComment($database, $name, $body, $entry_id);
          $this->flash->addMessage('global', "Success! Your comment has been added");
        } catch(Exception $e) {
          $this->flash->addMessage('global', 'Woops! Error' . $e->getMessage());
        }
        return $response->withRedirect($this->router->pathFor('detail', ['id' => $entry_id]));
      } else {
        $this->flash->addMessage('global', "Please fill out all fields");
        return $this->view->render($response, 'detail.twig', $args);
      }

    })->setName("comment.post");
};
