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
$UserController = new UserController($UserModel,$EventsModel);
$EventsController = new EventsController($EventsModel,$UserModel);

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
        session_start();
        if(empty($_SESSION['role'])){
            header('Location:/CapstoneWebsite/login');
            break;    
        }
        $users = $UserModel->getUsers();
        $events = $EventsModel->getEvents();
        include_once("./php/views/dashboard.php");
        break;
    case 'profile':
        $UserController->showProfilePageForMembers();
        break;
    case 'events':
        session_start();
        if(empty($_SESSION['role'])){
            header('Location:/CapstoneWebsite/login');
            break;    
        }
        $EventsController->Events_Add_Update();
        break;
    case 'update_profile':
        $UserController->updateProfile();
        break;
    case 'members':
        session_start();
        if(empty($_SESSION['role'])){
            header('Location:/CapstoneWebsite/login');
            break;    
        }
        $users = $UserModel->getUsers();
        include_once("php/views/members.php");
        break;
    case 'addMember':
        $UserController->addMember();
        break;
    case 'analytics':
        session_start();
        if(empty($_SESSION['role'])){
            header('Location:/CapstoneWebsite/login');
            break;    
        }
        $events_statistics = $EventsModel->EventsVSMembersVSCosts();
        include_once("php/views/analytics.php");
        break;
    default:
        http_response_code(404);
        echo '404 Not Found';
        break;
}
