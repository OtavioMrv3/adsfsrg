<?php
// Consultas do catálogo fora das páginas de apresentação.
function listarProdutos(PDO $pdo): array
{
    return $pdo->query('SELECT id, produto, preco, imagem FROM produtos ORDER BY id DESC')->fetchAll();
}

function listarProdutosGerenciamento(PDO $pdo): array
{
    return $pdo->query('SELECT id, produto, preco FROM produtos ORDER BY id DESC')->fetchAll();
}

function cadastrarProduto(PDO $pdo, string $nome, string $preco, string $descricao, ?string $imagem): bool
{
    $stmt = $pdo->prepare('INSERT INTO produtos (produto, preco, descricao, imagem) VALUES (?, ?, ?, ?)');
    return $stmt->execute([$nome, $preco, $descricao, $imagem]);
}

function excluirProduto(PDO $pdo, int $id): bool
{
    $stmt = $pdo->prepare('DELETE FROM produtos WHERE id = ?');
    return $stmt->execute([$id]);
}
