<?php 
include_once 'Connection.php';

class Post extends Connection
{
    public function createPost($image,$description)
    {
        $dsn = parent::createConnection();
        $query = $dsn->prepare('INSERT INTO posts (imagem, descricao) values (?,?)');
        return $query->execute([$image, $description]);
    }

    public function showPosts() 
    {
        $dsn = parent::createConnection();
        $query = $dsn->query('SELECT * FROM posts');
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
}


?>