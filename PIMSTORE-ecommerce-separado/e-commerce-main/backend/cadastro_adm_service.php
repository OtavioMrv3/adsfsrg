<?php
require_once __DIR__ . '/../includes/init.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../frontend/cadastro_adm.php');
    exit;
}
$dados = limparPost($_POST);
$nome = (string)($dados['nome-adm'] ?? '');
$senha = (string)($dados['senha-adm'] ?? '');
$confirmacao = (string)($dados['confirmar-senha-adm'] ?? '');
$erros = [];
if ($nome === '' || strlen($nome) > 100) $erros[] = 'Informe um nome de administrador de até 100 caracteres';
if (strlen($senha) < 6) $erros[] = 'A senha precisa ter pelo menos 6 caracteres';
if ($senha !== $confirmacao) $erros[] = 'Senhas não conferem';
if (!$erros) {
    $stmt = $pdo->prepare('SELECT id FROM administradores WHERE nome = ?');
    $stmt->execute([$nome]);
    if ($stmt->fetch()) $erros[] = 'Este usuário admin já está cadastrado';
}
if ($erros) {
    $_SESSION['erros'] = $erros;
    header('Location: ../frontend/cadastro_adm.php');
    exit;
}
$stmt = $pdo->prepare('INSERT INTO administradores (nome, senha) VALUES (?, ?)');
try {
    $stmt->execute([$nome, password_hash($senha, PASSWORD_DEFAULT)]);
} catch (PDOException $e) {
    error_log('Erro ao cadastrar administrador: ' . $e->getMessage());
    $_SESSION['erros'] = ['Erro ao cadastrar administrador'];
    header('Location: ../frontend/cadastro_adm.php');
    exit;
}
toast('Conta admin criada com sucesso');
header('Location: ../frontend/login_adm.php');
exit;
