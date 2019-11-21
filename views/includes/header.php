<?php 

$user = isset($_SESSION['login']) ? $_SESSION['login'] : [];

?>
<header>
        <nav class="navbar justify-content-evenly">
            <a class="navbar-brand" href="/desafio-OOP-PHP/"><img src="views/img/logo.png" alt="" srcset="">| Instagram</a>
            <?php if(isset($user) && $user != []): ?>
            <a href="#">Olá, <?php: $user["login"] ?>!</a>
            <?php else: ?>
            <a href="/desafio-OOP-PHP/login">Entrar</a>
            <?php endif; ?>
        </nav>
</header>