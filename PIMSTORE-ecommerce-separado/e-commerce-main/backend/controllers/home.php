<?php
require_once __DIR__ . '/../../includes/init.php';
require_once __DIR__ . '/../repositories/produtos.php';
$produtos = listarProdutos($pdo);
