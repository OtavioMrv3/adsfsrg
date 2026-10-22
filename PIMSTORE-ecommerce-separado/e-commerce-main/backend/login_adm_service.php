<?php
require_once __DIR__ . '/../includes/init.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../frontend/login_adm.php');
    exit;
}
$dados = limparPost($_POST);
$nome = (string)($dados['nome-adm'] ?? '');
$senha = (string)($dados['senha-adm'] ?? '');
if ($nome === '' || $senha === '') {
    $_SESSION['erros'] = ['Preencha o nome e a senha do administrador'];
    header('Location: ../frontend/login_adm.php');
    exit;
}
$stmt = $pdo->prepare('SELECT id, nome, senha FROM administradores WHERE nome = ?');
$stmt->execute([$nome]);
$adm = $stmt->fetch();
if (!$adm || !password_verify($senha, $adm['senha'])) {
    $_SESSION['erros'] = ['Usuário admin ou senha inválidos'];
    header('Location: ../frontend/login_adm.php');
    exit;
}
session_regenerate_id(true);
unset($_SESSION['usuario']);
$_SESSION['admin'] = ['id' => $adm['id'], 'nome' => $adm['nome']];
toast('Logado como admin com sucesso!');
header('Location: ../frontend/index.php');
exit;
