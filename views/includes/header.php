<?php $user = isset($_SESSION['login']) ? $_SESSION['login'] : []; ?>
<header>
        <nav class="navbar justify-content-evenly">
            <a class="navbar-brand" href="/desafio-OOP-PHP/"><img src="views/img/logo.png" alt="" srcset="">| Instagram</a>
            <?php if(isset($user) && $user != []): ?>
            <p class="m-0">Olá, <?= $user; ?>!</p>
            <?php else: ?>
            <a href="/desafio-OOP-PHP/login">Entrar</a>
            <?php endif; ?>
        </nav>
</header>