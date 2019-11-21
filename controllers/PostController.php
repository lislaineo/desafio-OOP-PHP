<?php 
include_once "models/Post.php";

class PostController
{
    public function action($route)
    {
        //qual ação vai tomar
        switch ($route) {
            case 'posts':
                $this->showPosts();
                break;

            case 'post-form':
                $this->viewForm();
                break;

            case 'create-post':
                $this->createPost();
                break;

            case 'login':
                $this->viewLogin();
                break;

            case 'register':
                $this->viewRegister();
                break;
        }
    }

    private function viewForm()
    {
        include "views/newPost.php";
    }

    private function viewPosts()
    {
        include "views/posts.php";
    }

    private function createPost()
    {
        $description = $_POST['description'];
        $fileName = $_FILES['image']['name'];
        $tmpTarget = $_FILES['image']['tmp_name'];
        $targetFile = "views/img/$fileName";
        move_uploaded_file($tmpTarget,$targetFile);

        $post = new Post();
        $result = $post->createPost($targetFile,$description);

        if($result) {
            header('Location:/desafio-OOP-PHP/posts');
        }
    }

    private function showPosts()
    {
        $post = new Post();
        $postList = $post->showPosts();
        $_REQUEST['posts'] = $postList;
        $this->viewPosts();
    }

    private function viewLogin()
    {
        include "views/login.php";
    }

    private function viewRegister()
    {
        include "views/register.php";
    }
}


?>