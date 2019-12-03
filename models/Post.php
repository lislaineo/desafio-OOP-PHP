<?php
include_once 'Connection.php';

// classe Post herda da Connection para conseguir conectar ao banco de dados
class Post extends Connection
{
  // método de criação de post (insere dados do post no banco)
  public function createPost($image, $description, $user)
  {
    $dsn = parent::createConnection();
    $query = $dsn->prepare('INSERT INTO posts (image, description, user_id) values (?,?,?)');
    return $query->execute([$image, $description, $user]);
  }

  // método de curtidas de post (insere dados da curtida no banco)
  public function likePost($user, $post)
  {
    $dsn = parent::createConnection();
    return $dsn->query("INSERT INTO posts_likes (user_id, post_id)
            (SELECT {$user}, {$post}
            FROM posts WHERE NOT EXISTS (SELECT id FROM posts_likes WHERE user_id = {$user} AND post_id = {$post})
            LIMIT 1)");
  }

  // método para mostrar os posts (busca dados no banco, mostra os posts e as curtidas)
  public function showPosts()
  {
    $dsn = parent::createConnection();
    $query = $dsn->query("SELECT posts.id, posts.image, posts.description, users.login, users.image as profilePic, COUNT(posts_likes.id) AS likes FROM posts LEFT JOIN posts_likes ON posts.id = posts_likes.post_id LEFT JOIN users ON posts.user_id = users.id GROUP BY posts.id ORDER BY posts.id DESC");
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }
}
