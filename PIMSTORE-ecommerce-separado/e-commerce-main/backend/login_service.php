<?php
require_once __DIR__ . '/../includes/init.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../frontend/login.php');
    exit;
}
$dados = limparPost($_POST);
$email = (string)($dados['email'] ?? '');
$senha = (string)($dados['senha'] ?? '');
if ($email === '' || $senha === '') {
    $_SESSION['erros'] = ['Preencha o e-mail e a senha'];
    header('Location: ../frontend/login.php');
    exit;
}
$stmt = $pdo->prepare('SELECT id, nome, email, senha FROM usuarios WHERE email = ?');
$stmt->execute([$email]);
$usuario = $stmt->fetch();
if (!$usuario || !password_verify($senha, $usuario['senha'])) {
    $_SESSION['erros'] = ['E-mail ou senha inválidos'];
    header('Location: ../frontend/login.php');
    exit;
}
session_regenerate_id(true);
unset($_SESSION['admin']);
$_SESSION['usuario'] = ['id' => $usuario['id'], 'nome' => $usuario['nome'], 'email' => $usuario['email']];
toast('Logado com sucesso!');
header('Location: ../frontend/index.php');
exit;
