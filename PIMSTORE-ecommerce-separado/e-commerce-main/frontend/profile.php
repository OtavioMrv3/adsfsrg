<?php
require_once __DIR__ . '/../backend/controllers/profile.php';
require_once __DIR__ . '/../includes/header.php';
?>
<body>

    <?php require_once __DIR__ . "/../includes/topbar.php"; ?>

    <main class="perfil-main">

        <section class="perfil-card">

            <div class="perfil-topo">
                <div class="perfil-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>

                <div class="perfil-info-principal">
                    <h1>Meu Perfil</h1>
                    <p>Gerencie suas informações da conta</p>
                </div>
            </div>

            <div class="perfil-conteudo">

                <div class="perfil-item">
                    <span class="perfil-label">
                        <i class="fa-solid fa-user"></i>
                        Nome
                    </span>

                    <p class="perfil-valor">
                        <?= htmlspecialchars($nomeUsuario, ENT_QUOTES, "UTF-8"); ?>
                    </p>
                </div>

                <div class="perfil-item">
                    <span class="perfil-label">
                        <i class="bi bi-lock-fill"></i>
                        Senha
                    </span>

                    <p class="perfil-valor">
                        Protegida
                    </p>
                </div>

                <div class="perfil-item">
                    <span class="perfil-label">
                        <i class="fa-solid fa-envelope"></i>
                        E-mail
                    </span>

                    <p class="perfil-valor">
                        <?= htmlspecialchars($emailUsuario, ENT_QUOTES, "UTF-8"); ?>
                    </p>
                </div>

                <div class="perfil-item">
                    <span class="perfil-label">
                        <i class="fa-solid fa-calendar"></i>
                        Conta criada
                    </span>

                    <p class="perfil-valor">
                        <?= htmlspecialchars($dataCadastro, ENT_QUOTES, "UTF-8"); ?>
                    </p>
                </div>

            </div>

            <div class="perfil-acoes">
                <a href="editar-perfil.php" class="btn-perfil">
                    <i class="fa-solid fa-pen"></i>
                    Editar Perfil
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