<?php
// No XAMPP local, utilize as configurações abaixo. Ajuste conforme seu MySQL.
$hostname = getenv('DB_HOST') ?: 'localhost';
$dbname   = getenv('DB_NAME') ?: 'pimstore_ecommerce';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : '';

try {
    $pdo = new PDO(
        "mysql:host={$hostname};dbname={$dbname};charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $e) {
    error_log('Falha de conexão com o MySQL: ' . $e->getMessage());
    http_response_code(503);
    exit('Não foi possível conectar ao banco de dados. Confira o MySQL e db/conexao.php.');
}
