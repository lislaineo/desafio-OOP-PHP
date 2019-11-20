<?php

//Pega a info digitada pelo usuario, se nada foi digitado leva para a página de posts
$route = key($_GET)?key($_GET):"posts";

//Define qual switch vai chamar
switch ($route) {
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
}

?>