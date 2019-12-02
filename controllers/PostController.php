<?php 
include_once "models/Post.php";

class PostController
{
    public function action($route)
    {
        //qual ação vai tomar
        switch ($route) {
            case 'home':
                $this->viewHome();
                break;

            case 'posts':
                $this->showPosts();
                break;

            case 'post-form':
                $this->viewForm();
                break;

            case 'create-post':
                $this->createPost();
                break;
            
            case 'like-post':
                $this->likePost();
                break;
        }
    }

    private function viewHome()
    {
        include "views/home.php";
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
        $user = $_POST['user_id'];
        $description = $_POST['description'];
        $fileName = $_FILES['image']['name'];
        $tmpTarget = $_FILES['image']['tmp_name'];
        $targetFile = "views/img/posts/$fileName";
        move_uploaded_file($tmpTarget,$targetFile);

        $post = new Post();
        $result = $post->createPost($targetFile,$description,$user);

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

    private function likePost()
    {
        $user = $_GET['user_id'];
        $post = $_GET['post_id'];
        $like = new Post();
        $likeCount = $like->likePost($user,$post);

        if($likeCount) {
            header('Location:/desafio-OOP-PHP/posts');
        }
    }
}
?>