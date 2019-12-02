<?php 
session_start();
if($_SESSION['login'] == []) {
    header('Location:/desafio-OOP-PHP/home');
}
var_dump($_SESSION);
// $posts = $_REQUEST['posts'];
$likes = $_REQUEST['likes'];
// var_dump($_REQUEST);
// exit;

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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
    
    <?php include "views/includes/header.php"; ?>
    <main class="board">
        <?php foreach($likes as $like): ?>
        <div class="card mt-5">
            <img id="card-img" src="<?php echo $like->image; ?>" alt="Card image cap">
            <div class="card-body">
                <a class="card-text" href="/desafio-OOP-PHP/like-post/<?php echo $like->id ?>/<?php echo $_SESSION['user_id']; ?>">
                    <i style='font-size:24px' class='far'>&#xf004;</i>
                </a>
                <p class="card-text">
                    <?php if($like->likes == 1): ?>
                        <strong><?php echo $like->likes; ?> curtida</strong>
                    <?php elseif($like->likes > 1): ?>
                        <strong><?php echo $like->likes; ?> curtidas</strong>
                    <?php endif; ?>
                </p>
                <p class="card-text">
                    <img src="<?php echo $like->profilePic; ?>" alt="Foto de perfil" class="profile-pic mr-2"> <strong><?php echo $like->login; ?></strong> <?php echo $like->description; ?>
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