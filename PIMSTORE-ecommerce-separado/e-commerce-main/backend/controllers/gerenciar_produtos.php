<?php
require_once __DIR__ . '/../auth.php';
exigirAdmin();
require_once __DIR__ . '/../../includes/init.php';
require_once __DIR__ . '/../repositories/produtos.php';
$produtos = listarProdutosGerenciamento($pdo);
