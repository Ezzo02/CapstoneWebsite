<?php
require_once("./php/config/db.php");
// Basic routing logic
$request_uri = $_SERVER['REQUEST_URI'];
$base_uri = dirname($_SERVER['SCRIPT_NAME']);

$route = str_replace($base_uri, '', $request_uri);
$route = trim($route, '/');
// echo $route;

//models require +initialization
require_once("./php/models/UsersModel.php");
$UserModel = new UserModel($conn);


//controllers require + initialization
require_once("./php/controllers/UsersController.php");
$UserController = new UserController($UserModel);


switch ($route) {
    case '':
        // require 'controllers/HomeController.php';
        // $controller = new HomeController();
        // $controller->index();
        // break;
    case 'login':

        $UserController->showLoginForm();
        break;
    default:
        http_response_code(404);
        echo '404 Not Found';
        break;
}
