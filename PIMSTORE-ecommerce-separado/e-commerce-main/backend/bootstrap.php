<?php
// Inicialização compartilhada para controladores e processadores de formulários.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../includes/functions_helpers.php';
