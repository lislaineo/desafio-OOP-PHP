<?php $user = isset($_SESSION['login']) ? $_SESSION['login'] : []; ?>
<header class="fixed-top">
        <nav class="navbar justify-content-evenly">
            <a class="navbar-brand" href="/desafio-OOP-PHP/"><img src="views/img/logo.png" alt="" srcset="">| Instagram</a>
            <?php if(isset($user) && $user != []): ?>
            <div class="row">
                <p class="my-0 px-1">Olá, <?= $user; ?>!</p>
                <a href="/desafio-OOP-PHP/logout" class="px-3">Sair</a>
            </div>
            <?php else: ?>
            <a href="/desafio-OOP-PHP/login">Entrar</a>
            <?php endif; ?>
        </nav>
</header>