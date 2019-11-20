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
        $description = $_POST['descricao'];
        $fileName = $_FILES['img']['name'];
        $tmpTarget = $_FILES['img']['tmp_name'];
        $targetFile = "views/img/$fileName";
        move_uploaded_file($tmpTarget,$targetFile);

        $post = new Post();
        $result = $post->createPost($targetFile,$description);

        if($result) {
            header('Location:/fake-insta/posts');
        }
    }

    private function showPosts()
    {
        $post = new Post();
        $postList = $post->showPosts();
        $_REQUEST['posts'] = $postList;
        $this->viewPosts();
    }
}


?>