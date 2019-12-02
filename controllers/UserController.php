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
        $fileName = $_FILES['profilePic']['name'];
        $tmpTarget = $_FILES['profilePic']['tmp_name'];
        $targetFile = "views/img/profile/$fileName";
        move_uploaded_file($tmpTarget,$targetFile);

        $user = new User();
        $result = $user->createUser($targetFile,$login,$hashPass,$name,$email);

        $this->getUserInfo();
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

        if(password_verify($pass,$userInfo[0]->password)) {
            session_start();
            $_SESSION['login'] = $login;
            $_SESSION['user_id'] = $userInfo[0]->id;
            header('Location:/desafio-OOP-PHP/posts');
        } else {
            echo "Senha errada";
        }
    }
}


?>