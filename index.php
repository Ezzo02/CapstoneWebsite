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
require_once("./php/models/EventsModel.php");
$UserModel = new UserModel($conn);
$EventsModel = new EventsModel($conn);


//controllers require + initialization
require_once("./php/controllers/UsersController.php");
require_once("./php/controllers/EventsController.php");
$UserController = new UserController($UserModel);
$EventsController = new EventsController($EventsModel);

// echo $route;
switch ($route) {
    case '':
        $UserController->showLoginForm();
        break;
    case 'login':
        $UserController->showLoginForm();
        break;
    case 'logout':
        session_start();
        session_unset(); 
        session_destroy();
        header('Location:/CapstoneWebsite/login');
        break; 
    case 'dashboard':
        $events = $EventsModel->getEvents();
        include_once("./php/views/dashboard.php");
        break;
    case 'events':
        $EventsController->Events_Add_Update();
        break;

    default:
        http_response_code(404);
        echo '404 Not Found';
        break;
}
