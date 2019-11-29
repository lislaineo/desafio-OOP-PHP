<?php 
session_start();
if($_SESSION['login'] == []) {
    header('Location:/desafio-OOP-PHP/home');
}
// var_dump($_SESSION);
$posts = $_REQUEST['posts'];
var_dump($posts);

// $type = $_GET['type'];
// var_dump($type);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fakeinsta - Posts</title>
    <link rel="shortcut icon" href="views/img/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Grand+Hotel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/styles.css">
</head>
<body>
    
    <?php include "views/includes/header.php"; ?>
    <main class="board">
    <?php foreach($posts as $post): ?>
        <div class="card mt-5">
            <img id="cardimg" src="<?php echo $post->image; ?>" alt="Card image cap">
            <div class="card-body">
                <a class="card-text" href="/desafio-OOP-PHP/like-post/<?php echo $post->id ?>/<?php echo $_SESSION['user_id']; ?>">
                    Like
                </a>
                <p class="card-text">
                    <?php echo $post->description; ?>
                </p>
                <p class="card-text">
                    Publicado por: <strong><?php echo $post->login; ?></strong>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
        <a class="float-button" href="/desafio-OOP-PHP/post-form">&#10010;</a>
    </main>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>