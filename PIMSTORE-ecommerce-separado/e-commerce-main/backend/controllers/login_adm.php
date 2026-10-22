<?php
require_once __DIR__ . '/../bootstrap.php';
$erros = $_SESSION['erros'] ?? [];
unset($_SESSION['erros']);
