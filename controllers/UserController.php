<?php 
include_once "models/User.php";

class UserController
{
    public function action($route)
    {
        //qual ação vai tomar
        switch ($route) {
            case 'login':
                $this->viewLogin();
                break;
            
            case 'logout':
                $this->viewLogout();
                break;

            case 'register':
                $this->viewRegister();
                break;
            
            case 'create-user':
                $this->createUser();
                break;

            case 'get-user-info':
                $this->getUserInfo();
                break;
        }
    }

    private function viewLogin()
    {
        include "views/login.php";
    }

    private function viewLogout()
    {
        session_start();
        session_destroy();
        header('Location:/desafio-OOP-PHP/home');
    }

    private function viewRegister()
    {
        include "views/register.php";
    }

    private function createUser()
    {
        $login = $_POST['login'];
        $pass = $_POST['password'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $hashPass = password_hash($pass,PASSWORD_DEFAULT);

        $user = new User();
        $result = $user->createUser($login,$hashPass,$name,$email);

        if($result) {
            header('Location:/desafio-OOP-PHP/posts');
        }
    }

    private function getUserInfo()
    {
        $login = $_POST['login'];
        $pass = $_POST['password'];
       
        $user = new User();
        $userInfo = $user->getUserInfo($login);
        $_POST['users'] = $userInfo;
        // var_dump($userInfo[0]->password);

        if(password_verify($pass,$userInfo[0]->password)) {
            session_start();
            $_SESSION['login'] = $login;
            header('Location:/desafio-OOP-PHP/posts');
        }
    }
}


?>