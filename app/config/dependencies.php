<?php

use Slim\App;
use \Slim\Views\PhpRenderer;
use \Slim\Views\Twig;
use \Slim\Http\Uri;
use \Slim\Http\Environment;
use \Slim\Views\TwigExtension;
// use App\Controllers\HomeController;

return function (App $app) {
    $container = $app->getContainer();

   // twig view renderer service
   $container['view'] = function ($c) {
      $settings = $c->get('settings')['twig'];
      $view = new Twig($settings['view_path'], [
          'cache' => $settings['cache_path']
      ]);

      $router = $c->get('router');
      $uri = Uri::createFromEnvironment(new Environment($_SERVER));
      $view->addExtension(new TwigExtension($router, $uri));

      return $view;
   };

   // database service for PDO
   // $container['db_pdo'] = function ($c) {
   //    $db = $c['settings']['db'];
   //    $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'], $db['user'], $db['pass']);
   //    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

   //    return $pdo;
   // };

   // controller service for HomeController
   // $container['home'] = function ($c) {
   //    $view = $c->get('view');
   //    $table = $c->get('db')->table('movies');
   //    $router = $c->get('router');
   //    return new HomeController($view, $table, $router);
   // };
};
