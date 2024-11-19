<?php


?>
<header>
    <a href="/">
        <h1>
            Events
        </h1>
    </a>
    <?php if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === "/"): ?>
    <nav>
        <input id="input__search" type="text" placeholder="Procurar eventos...">
        <button id="button__search"><i class="fa-solid fa-magnifying-glass"></i> search</button>
    </nav>
    <?php endif;?>
    <?php if (isset($_SESSION['usuario_id'])): ?>
        <button data-bs-toggle="modal" data-bs-target="#exampleModal">
            Sair
        </button>
        <?php require "component/modal.php" ?>

    <?php else: ?>
        <?php if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) !== "/client/register"): ?>
            <button><a href="/client/register">Registro</a></button>
        <?php else: ?>
            <button><a href="/client/login">Login</a></button>
        <?php endif; ?>
    <?php endif; ?>
</header>