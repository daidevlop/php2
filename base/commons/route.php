<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function(){
    return "trang chủ";
});
$router->get('list-course',[App\Controllers\CourseController::class,'getCourse']);

$router->get('delete-course/{id}',[App\Controllers\CourseController::class,'dlCuorse']);

$router->get('add-course',[App\Controllers\CourseController::class,'addCourse']);
$router->post('post-course',[App\Controllers\CourseController::class,'postCourse']);

$router->get('detail-course/{id}',[App\Controllers\CourseController::class,'detailCourse']);
$router->post('edit-course/{id}',[App\Controllers\CourseController::class,'editCourse']);
# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>