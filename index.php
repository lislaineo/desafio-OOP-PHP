<?php

//Pega a info digitada pelo usuario, se nada foi digitado leva para a página de cadastro
$route = key($_GET)?key($_GET):"home";
// var_dump(key($_GET));
// exit;

//Define qual switch vai chamar
switch ($route) {
    case 'home':
        include "controllers/PostController.php";
        $controller = new PostController();
        $controller->action($route);
        break;

    case 'posts':
        include "controllers/PostController.php";
        $controller = new PostController();
        $controller->action($route);
        break;

    case 'post-form':
        include "controllers/PostController.php";
        $controller = new PostController();
        $controller->action($route);
        break;

    case 'create-post':
        include "controllers/PostController.php";
        $controller = new PostController();
        $controller->action($route);
        break;

    case 'login':
        include "controllers/UserController.php";
        $controller = new UserController();
        $controller->action($route);
        break;

    case 'logout':
        include "controllers/UserController.php";
        $controller = new UserController();
        $controller->action($route);
        break;
        
    case 'register':
        include "controllers/UserController.php";
        $controller = new UserController();
        $controller->action($route);
        break;

    case 'create-user':
        include "controllers/UserController.php";
        $controller = new UserController();
        $controller->action($route);
        break;

    case 'get-user-info':
        include "controllers/UserController.php";
        $controller = new UserController();
        $controller->action($route);
        break;
    
    case 'like-post':
        include "controllers/PostController.php";
        $controller = new PostController();
        $controller->action($route);
        break;
}

?>