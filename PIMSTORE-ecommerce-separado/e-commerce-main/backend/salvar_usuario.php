<?php
require_once __DIR__ . '/../includes/init.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../frontend/cadastro.php');
    exit;
}
$dados = limparPost($_POST);
$nome = (string)($dados['nome'] ?? '');
$email = (string)($dados['email'] ?? '');
$senha = (string)($dados['senha'] ?? '');
$confirmacao = (string)($dados['confirmarSenha'] ?? '');
$erros = [];
if ($nome === '' || strlen($nome) > 80) $erros[] = 'Informe um nome de até 80 caracteres';
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 100) $erros[] = 'Informe um e-mail válido';
if (strlen($senha) < 6) $erros[] = 'A senha precisa ter pelo menos 6 caracteres';
if ($senha !== $confirmacao) $erros[] = 'Senhas não conferem';
if (!$erros) {
    $stmt = $pdo->prepare('SELECT id FROM usuarios WHERE email = ?');
    $stmt->execute([$email]);
    if ($stmt->fetch()) $erros[] = 'Este e-mail já está cadastrado';
}
if ($erros) {
    $_SESSION['erros'] = $erros;
    header('Location: ../frontend/cadastro.php');
    exit;
}
$stmt = $pdo->prepare('INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)');
try {
    $stmt->execute([$nome, $email, password_hash($senha, PASSWORD_DEFAULT)]);
} catch (PDOException $e) {
    error_log('Erro ao cadastrar usuário: ' . $e->getMessage());
    $_SESSION['erros'] = ['Erro ao cadastrar usuário. Confira o e-mail informado.'];
    header('Location: ../frontend/cadastro.php');
    exit;
}
toast('Conta criada com sucesso');
header('Location: ../frontend/login.php');
exit;
