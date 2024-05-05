<?php

class UserController
{
    private $userModel;
    private $eventModel;
    private $username;
    private $password;
    private $error; // New property to store error messages

    public function __construct(UserModel $userModel, EventsModel $eventsModel)
    {
        $this->userModel = $userModel;
        $this->eventModel = $eventsModel;
    }

    public function showLoginForm()
    {
        session_start();
        if (isset($_SESSION["username"])) {
            if (isset($_SESSION["role"])) {
                header('Location:/CapstoneWebsite/dashboard');
            } else {
                header('Location:/CapstoneWebsite/profile');
            }
            return;
        }

        if (isset($_POST["login-submit"])) {
            if ($this->login() === true) {
                if (isset($_SESSION["role"])) {
                    header('Location:/CapstoneWebsite/dashboard');
                } else {
                    header('Location:/CapstoneWebsite/profile');
                }
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
                $_SESSION["username"] = $this->username;
                if ($this->userModel->getisAdminByName($this->username)) {
                    $_SESSION["role"] = 'admin';
                }
                return true;
            } else {
                return false;
            }
        }
    }

    public function showProfilePageForMembers()
    {
        session_start();
        if (empty($_SESSION['username'])) {
            header('Location:/CapstoneWebsite/login');
            return;
        }

        $user = $this->userModel->getUserByName($_SESSION['username']);
        $events = $this->eventModel->getEventsofMember($user['ID']);
        $percentParticipation = $this->eventModel->getParticipationPercentage($user['ID']);
        // echo $percentParticipation;
        // echo print_r($events);
        // echo print_r($user);
        include_once ("./php/views/profile.php");


    }

    public function updateProfile()
    {
        if (isset($_POST['update-profile-submit'])) {
            session_start();
            $username = $_SESSION['username'];
            $email = $_POST['profile-email'];
            $address = $_POST['profile-address'];
            $phoneNumber = $_POST['profile-phone'];
            $birthday = $_POST['profile-birthday'];
            $emergencyContact = $_POST['profile-emergency'];
            $bloodType = $_POST['profile-blood'];
            $about = $_POST['profile-about'];

            $this->userModel->updateProfile($username, $email, $address, $phoneNumber, $birthday, $emergencyContact, $bloodType, $about);

            header('Location: /CapstoneWebsite/profile');
            exit;
        } else {
            header('Location: /CapstoneWebsite/profile');
            exit;
        }
    }

}
?>