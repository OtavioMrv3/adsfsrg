<?php
require_once __DIR__ . '/../backend/controllers/gerenciar_produtos.php';
require_once __DIR__ . '/../includes/header.php';
?>
<body>

    <?php require_once __DIR__ . "/../includes/topbar.php"; ?>

    <main class="lista-produtos-main">
        <?php if (!empty($_SESSION['erros'])): ?>
            <p role="alert"><?= htmlspecialchars((string)$_SESSION['erros'][0], ENT_QUOTES, 'UTF-8'); ?></p>
            <?php unset($_SESSION['erros']); ?>
        <?php endif; ?>

        <section class="topo-lista">
            <div>
                <span class="tag-produtos">Painel</span>
                <h1>Produtos cadastrados</h1>
                <p>Visualize todos os produtos cadastrados no sistema.</p>
            </div>

            <a href="adicionar_produto.php" class="btn-novo-produto">
                <i class="fa-solid fa-plus"></i>
                Novo produto
            </a>
        </section>

        <section class="lista-produtos">

            <?php if (!empty($produtos)): ?>
                <?php foreach ($produtos as $produto): ?>

                    <!-- PRODUTO -->
                    <article class="linha-produto">

                        <div class="produto-esquerda">

                            <div class="produto-imagem">
                                <i class="fa-solid fa-box"></i>
                            </div>

                            <div class="produto-info">
                                <h2><?= htmlspecialchars(ucfirst($produto["produto"]), ENT_QUOTES, "UTF-8"); ?></h2>
                                <span>#<?= $produto["id"]; ?></span>
                            </div>

                        </div>

                        <div class="produto-direita">

                            <div class="produto-preco">
                                <span>Preço</span>
                                <strong><?= formatarMoeda($produto["preco"]); ?></strong>
                            </div>

                            <div class="acoes-produto">

                                <form action="../backend/excluir_produto.php" method="POST">

                                    <input type="hidden" name="id" value="<?= (int) $produto['id'] ?>">

                                    <button class="btn-excluir" type="submit">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                </form>
                            </div>

                        </div>

                    </article>

                <?php endforeach; ?>
            <?php endif; ?>

        </section>

    </main>

    <?php require_once __DIR__ . "/../includes/footer.php"; ?>
</body>

<!-- EDITAR PRODUTO COM MODAL E JS MOSTRANDO PRODUTO ATUAL E UPDATE NO BACKEND -->

</html>