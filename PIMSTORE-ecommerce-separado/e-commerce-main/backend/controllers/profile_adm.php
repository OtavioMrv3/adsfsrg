<?php
require_once __DIR__ . '/../auth.php';
exigirAdmin();
require_once __DIR__ . '/../../includes/init.php';
$stmt = $pdo->prepare('SELECT criado_em FROM administradores WHERE id = ?');
$stmt->execute([$_SESSION['admin']['id']]);
$criadoEm = $stmt->fetchColumn();
$dataCadastro = $criadoEm ? date('d/m/Y', strtotime($criadoEm)) : 'Não informada';
