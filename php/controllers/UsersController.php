<?php

class UserController {
    private $userModel;

    public function __construct(UserModel $userModel) {
        $this->userModel = $userModel;
    }
    // public function login(){
    //     // do whatever needed in database interaction + handle input from user then send login view page if not logged in
    //     if($_POST['login'])
    //     require_once("./php/views/login.php");
    // }


    public function showLoginForm()
    {
        session_start();
        if (isset($_SESSION["username"])) {
            header('Location:/CapstoneWebsite/dashboard');
            return;
        }

        if (isset($_POST["login-submit"])) {
            if ($this->login() === true) {
                header('Location:/CapstoneWebsite/dashboard');
            } else {
                include 'php/views/login.php';
            }
        } else {
            include 'php/views/login.php';
        }
    }

    public function login()
    {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = array("username" => $_POST['username'], "password" => $_POST['password']);

            if ($this->userModel->loginUser($user)) {
                session_start();
                $_SESSION["username"] = $_POST['username'];
                return true;
            } else {
                return false;
            }

        }
    }







    // public function showUserProfile($userId) {
    //     $user = $this->userModel->getUserById($userId);
    //     include 'src/views/profile.php';  // Pass control to the view
    // }
}
