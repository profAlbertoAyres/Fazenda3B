<nav class="navbar navbar-expand-lg stick-top bg-body-dark">
    <div class="container">
        <img src="" alt="Logo">
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navgation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="racas.php" class="nav-link">Raça</a>
                </li>
                <li class="nav-item">
                    <a href="animais.php" class="nav-link">Animal</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Categoria</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Produto</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Lote</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Manejo</a>
                </li>
                <li class="nav-item">
                    <a href="usuarios.php" class="nav-link">Usuários</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" aria-expanded="false"
                        data-bs-toggle="dropdown">

                        <?php
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }
                        echo $_SESSION['user_name'];
                        ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a href="dashboard.php" class="dropdown-item">Painel de Controle</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a href="alterar_senha.php" class="dropdown-item">Alterar senha</a>
                        </li>
                        <li>
                            <a href="alterar_email.php" class="dropdown-item">Alterar E-mail</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>