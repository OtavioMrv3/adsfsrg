<?php
require_once __DIR__ . '/../backend/controllers/login.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <link rel="stylesheet" href="../assets/css/toast.css">
    <title>Login | PIMSTORE</title>
</head>

<body>

    <header>
        <a class="nome" href="index.php"><span>PIM</span>STORE</a>
    </header>

    <main class="auth-page">
        <section class="auth-card login-card">
            <div class="user-icon">
                <i class="fa-regular fa-user"></i>
            </div>

            <div class="auth-title">
                <h1>Bem-vindo à <span>PIM</span>STORE</h1>
                <p>Faça login para acessar sua conta e continuar sua jornada gamer.</p>
            </div>

            <form action="../backend/login_service.php" method="post">
                <label for="email">E-mail</label>
                <div class="input-box">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="seu@email.com" autocomplete="email" required maxlength="60">
                </div>

                <label for="senha">Senha</label>
                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="senha" name="senha" placeholder="••••••••••" autocomplete="current-password" required minlength="6" maxlength="20">
                    <button class="show-password" type="button" aria-label="Mostrar senha" data-target="senha">
                        <i class="fa-regular fa-eye-slash"></i>
                    </button>
                </div>

                <div class="form-options">
                    <label class="check-option">
                        <input type="checkbox" checked>
                        <span>Lembrar de mim</span>
                    </label>
                    <a href="#">Esqueci minha senha</a>
                </div>

                <?php if (!empty($erros)): ?>

                    <div class="box-erros">

                        <p class="erro">
                            <i class="bi bi-exclamation-triangle-fill"></i> <?= htmlspecialchars((string)$erros[0], ENT_QUOTES, "UTF-8"); ?>
                        </p>

                    </div>

                <?php endif; ?>

                <button class="btn-primary mb-3" type="submit">
                    Entrar
                    <i class="fa-solid fa-arrow-right"></i>
                </button>

                <a href="login_adm.php" class="social-btn" type="button">
                    Entrar como administrador
                    <i class="bi bi-person-fill"></i>
                </a>

                <a class="btn-secondary" href="cadastro.php">Criar conta</a>

                <div class="divider">
                    <span>Ou continue com</span>
                </div>

                <div class="social-login">
                    <a href="#" class="social-btn google">
                        <i class="fa-brands fa-google"></i>
                        Google
                    </a>
                    <a href="#" class="social-btn twitch">
                        <i class="fa-brands fa-twitch"></i>
                        Twitch
                    </a>
                </div>
            </form>
        </section>
    </main>

    <script src="../assets/js/auth.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>

    <?php require_once __DIR__ . "/../includes/toast.php"; ?>
</body>

</html>