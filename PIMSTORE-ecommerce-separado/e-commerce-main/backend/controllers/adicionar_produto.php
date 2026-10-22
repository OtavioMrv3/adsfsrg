<?php
require_once __DIR__ . '/../auth.php';
exigirAdmin();
$erros = $_SESSION['erros'] ?? [];
unset($_SESSION['erros']);
