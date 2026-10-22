<?php
require_once __DIR__ . '/bootstrap.php';

function exigirAdmin(): void
{
    if (!isset($_SESSION['admin'])) {
        header('Location: ../frontend/login_adm.php');
        exit;
    }
}

function exigirUsuario(): void
{
    if (!isset($_SESSION['usuario'])) {
        header('Location: ../frontend/login.php');
        exit;
    }
}
