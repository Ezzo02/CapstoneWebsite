<?php

class UserController
{
    private $userModel;
    private $username;
    private $password;
    private $error; // New property to store error messages

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

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
                $this->error = "Incorrect username or password. Please try again.";
                $error = $this->error;
                $username = isset($this->username) ? $this->username : '';
                $password = isset($this->password) ? $this->password : '';
                include 'php/views/login.php';
            }
        } else {
            $username = isset($this->username) ? $this->username : '';
            $password = isset($this->password) ? $this->password : '';
            include 'php/views/login.php';
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->username = $_POST['username'];
            $this->password = $_POST['password'];

            $user = array("username" => $this->username, "password" => $this->password);

            if ($this->userModel->loginUser($user)) {
                session_start();
                $_SESSION["username"] = $this->username;
                return true;
            } else {
                return false;
            }
        }
    }
}
?>
