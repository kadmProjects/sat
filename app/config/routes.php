<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
//use Psr\Http\Message\ServerRequestInterface as Request;
//use Psr\Http\Message\ResponseInterface as Response;

return function (App $app) {
    $container = $app->getContainer();

   $app->get('/', function (Request $request, Response $response, array $args) use ($container) {
      return $this->view->render($response, 'home.twig');
   });

   $app->get('/home', function (Request $request, Response $response, array $args) use ($container) {
      return $this->view->render($response, 'home.twig');
   });

   $app->get('/about', function (Request $request, Response $response, array $args) use ($container) {
      return $this->view->render($response, 'about.twig');
   });

   $app->get('/register', function (Request $request, Response $response, array $args) use ($container) {
      return $this->view->render($response, 'register.twig');
   });
   $app->get('/learning', function (Request $request, Response $response, array $args) use ($container) {
      return $this->view->render($response, 'learning.twig');
   });

   $app->get('/examination', function (Request $request, Response $response, array $args) use ($container) {
      return $this->view->render($response, 'examination.twig');
   });
   $app->get('/results', function (Request $request, Response $response, array $args) use ($container) {
      return $this->view->render($response, 'results.twig');
   });

   $app->get('/contact', function (Request $request, Response $response, array $args) use ($container) {
      return $this->view->render($response, 'contact.twig');
   });

   $app->get('/branches', function (Request $request, Response $response, array $args) use ($container) {
      return $this->view->render($response, 'branches.twig');
   });

};
