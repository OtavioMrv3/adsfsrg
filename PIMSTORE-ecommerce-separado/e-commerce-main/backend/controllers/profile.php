<?php
require_once __DIR__ . '/../auth.php';
exigirUsuario();
$nomeUsuario = $_SESSION['usuario']['nome'] ?? 'Usuário';
$emailUsuario = $_SESSION['usuario']['email'] ?? '';
require_once __DIR__ . '/../../includes/init.php';
$stmt = $pdo->prepare('SELECT criado_em FROM usuarios WHERE id = ?');
$stmt->execute([$_SESSION['usuario']['id']]);
$criadoEm = $stmt->fetchColumn();
$dataCadastro = $criadoEm ? date('d/m/Y', strtotime($criadoEm)) : 'Não informada';
