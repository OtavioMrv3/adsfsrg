<?php
require_once __DIR__ . '/auth.php';
exigirAdmin();
require_once __DIR__ . '/../includes/init.php';
require_once __DIR__ . '/repositories/produtos.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../frontend/gerenciar_produtos.php');
    exit;
}

$id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($id !== false && $id !== null) {
    excluirProduto($pdo, $id);
    toast('Produto excluído com sucesso!');
} else {
    $_SESSION['erros'] = ['Produto inválido'];
}
header('Location: ../frontend/gerenciar_produtos.php');
exit;
