<?php
require_once __DIR__ . '/auth.php';
exigirAdmin();
require_once __DIR__ . '/../includes/init.php';
require_once __DIR__ . '/repositories/produtos.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../frontend/adicionar_produto.php');
    exit;
}

$dados = limparPost($_POST);
$nome = (string)($dados['produto-nome'] ?? '');
$preco = (string)($dados['produto-preco'] ?? '');
$descricao = (string)($dados['descricao'] ?? '');
$imagem = $_FILES['imagem'] ?? null;
$erros = [];

if ($nome === '') $erros[] = 'Digite o nome do produto';
if (strlen($nome) > 100) $erros[] = 'O nome do produto deve ter no máximo 100 caracteres';
if ($preco === '') $erros[] = 'Digite o preço do produto';
elseif (!is_numeric($preco) || !is_finite((float)$preco) || (float)$preco < 0 || (float)$preco > 99999999.99) {
    $erros[] = 'Preço inválido';
}

$novoNomeImagem = null;
$extensao = null;
if ($imagem && $imagem['error'] !== UPLOAD_ERR_NO_FILE) {
    if ($imagem['error'] !== UPLOAD_ERR_OK) {
        $erros[] = 'Não foi possível enviar a imagem';
    } elseif ($imagem['size'] > 5 * 1024 * 1024) {
        $erros[] = 'A imagem deve ter no máximo 5MB';
    } else {
        // Verifica o conteúdo real, não somente a extensão informada pelo navegador.
        $tipo = (new finfo(FILEINFO_MIME_TYPE))->file($imagem['tmp_name']);
        $extensoes = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/webp' => 'webp',
        ];
        $extensao = $extensoes[$tipo] ?? null;
        if ($extensao === null) $erros[] = 'Formato de imagem inválido (use JPG, PNG ou WEBP)';
    }
}

if ($erros) {
    $_SESSION['erros'] = $erros;
    header('Location: ../frontend/adicionar_produto.php');
    exit;
}

if ($extensao !== null) {
    $novoNomeImagem = bin2hex(random_bytes(16)) . '.' . $extensao;
    if (!move_uploaded_file($imagem['tmp_name'], __DIR__ . '/../uploads/' . $novoNomeImagem)) {
        $_SESSION['erros'] = ['Não foi possível salvar a imagem'];
        header('Location: ../frontend/adicionar_produto.php');
        exit;
    }
}

try {
    cadastrarProduto($pdo, $nome, number_format((float)$preco, 2, '.', ''), $descricao, $novoNomeImagem);
} catch (PDOException $e) {
    if ($novoNomeImagem !== null) @unlink(__DIR__ . '/../uploads/' . $novoNomeImagem);
    error_log('Erro ao cadastrar produto: ' . $e->getMessage());
    $_SESSION['erros'] = ['Erro ao cadastrar produto'];
    header('Location: ../frontend/adicionar_produto.php');
    exit;
}

toast('Produto cadastrado com sucesso!');
header('Location: ../frontend/gerenciar_produtos.php');
exit;
