<?php
require_once __DIR__ . '/../backend/controllers/profile_adm.php';
require_once __DIR__ . '/../includes/header.php';
?>
<body>

    <?php require_once __DIR__ . "/../includes/topbar.php"; ?>

    <main class="perfil-main">

        <section class="perfil-card admin-card">

            <div class="perfil-topo">

                <div class="perfil-avatar admin-avatar">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>

                <div class="perfil-info-principal">
                    <h1>Painel do Administrador</h1>
                    <p>Gerencie sua conta administrativa</p>
                </div>

            </div>

            <div class="perfil-conteudo">

                <div class="perfil-item">

                    <span class="perfil-label">
                        <i class="fa-solid fa-user-shield"></i>
                        Administrador
                    </span>

                    <p class="perfil-valor">
                        <?= htmlspecialchars($_SESSION["admin"]["nome"] ?? "Administrador", ENT_QUOTES, "UTF-8"); ?>
                    </p>

                </div>

                <div class="perfil-item">

                    <span class="perfil-label">
                        <i class="fa-solid fa-calendar"></i>
                        Criado em
                    </span>

                    <p class="perfil-valor">
                        <?= htmlspecialchars($dataCadastro, ENT_QUOTES, "UTF-8"); ?>
                    </p>

                </div>

            </div>

            <div class="perfil-acoes">

                <a href="adicionar_produto.php" class="btn-perfil">
                    <i class="fa-solid fa-plus"></i>
                    Adicionar Produto
                </a>

                <a href="painel_admin.php" class="btn-perfil">
                    <i class="fa-solid fa-chart-line"></i>
                    Painel Admin
                </a>

                <a href="../backend/logout.php" class="btn-perfil sair">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Sair da Conta
                </a>

            </div>

        </section>

    </main>

    <?php require_once __DIR__ . "/../includes/footer.php"; ?>

</body>

</html>