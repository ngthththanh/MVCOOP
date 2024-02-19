<?php
use Bramus\Router\Router;
use Asus\Mvcoop\Controllers\Admin\AuthenticateController;
use Asus\Mvcoop\Controllers\Admin\CategoryController;
use Asus\Mvcoop\Controllers\Admin\PostController;

use Asus\Mvcoop\Controllers\Admin\DashboardController;
use Asus\Mvcoop\Controllers\Admin\SlideController;

use Asus\Mvcoop\Controllers\Admin\UserController;
use Asus\Mvcoop\Controllers\Client\HomeController;
use Asus\Mvcoop\Controllers\Client\PostController as ClientPostController;
use Asus\Mvcoop\Controllers\Client\SlideController as ClientSlideController;
use Asus\Mvcoop\Controllers\Client\CategoryController as ClientCategoryController;

// Create Router instance
$router = new Router();

// Define routes
$router->get('/', HomeController::class . '@index');
$router->get('/post/{id}', ClientPostController::class . '@show');
$router->get('/post/{id}', ClientSlideController::class . '@show');
$router->mount('/category/{id}', function () use ($router) {
     $router->get('/', ClientCategoryController::class . '@show'); 
     $router->get('/post/{id}', ClientPostController::class . '@show');
});

$router->match('GET|POST', '/auth/login', AuthenticateController::class .'@login');
$router->mount('/admin', function () use ($router) {
     $router->get('/', DashboardController::class . '@index');

     $router->get('/logout', AuthenticateController::class .'@logout');
     $router->mount('/users', function () use ($router) {
          $router->get('/', UserController::class . '@index');
          $router->get('/{id}/show', UserController::class . '@show');
          $router->get('/{id}/delete', UserController::class . '@delete');
          $router->match('GET|POST', '/{id}/update', UserController::class . '@update');
          $router->match('GET|POST', '/create', UserController::class . '@create');
     });
     $router->mount('/categories', function () use ($router) {
          $router->get('/', CategoryController::class . '@index');
          $router->get('/{id}/show', CategoryController::class . '@show');
          $router->get('/{id}/delete', CategoryController::class . '@delete');
          $router->match('GET|POST', '/{id}/update', CategoryController::class . '@update');
          $router->match('GET|POST', '/create', CategoryController::class . '@create');
     });
     $router->mount('/posts', function () use ($router) {
          $router->get('/', PostController::class . '@index');
          $router->get('/{id}/show', PostController::class . '@show');
          $router->get('/{id}/delete', PostController::class . '@delete');
          $router->match('GET|POST', '/{id}/update', PostController::class . '@update');
          $router->match('GET|POST', '/create', PostController::class . '@create');
     });
     $router->mount('/slides', function () use ($router) {
          $router->get('/', SlideController::class . '@index');
          $router->get('/{id}/show', SlideController::class . '@show');
          $router->get('/{id}/delete', SlideController::class . '@delete');
          $router->match('GET|POST', '/{id}/update', SlideController::class . '@update');
          $router->match('GET|POST', '/create', SlideController::class . '@create');
     });
});
$router->before('GET|POST', '/admin/*', function() {
     if(!isset($_SESSION['user'])){
         header('Location: /auth/login');
         exit();
     }
 });
 $router->before('GET|POST', '/admin/.*', function() {
     if(!isset($_SESSION['user'])){
         header('Location: /auth/login');
         exit();
     }
 });
// Run it!
$router->run();
