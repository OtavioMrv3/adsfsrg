<?php
require_once __DIR__ . '/bootstrap.php';
unset($_SESSION['usuario'], $_SESSION['admin']);
session_regenerate_id(true);
toast('Você foi desconectado com sucesso!');
header('Location: ../frontend/index.php');
exit;
