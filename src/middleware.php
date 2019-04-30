<?php

use Slim\App;

return function (App $app) {
  // this function and the call from base.twig brought to you by:
  // https://stackoverflow.com/questions/35942214/how-to-use-flash-messaging-with-redirects-in-slim-3-and-twig
  $app->add(function ($request, $response, $next) {
    $this->view->offsetSet("flash", $this->flash);
    return $next($request, $response);
  });
};
