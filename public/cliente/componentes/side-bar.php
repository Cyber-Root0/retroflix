<?php
 require_once __DIR__."/../../../vendor/autoload.php";
 require_once __DIR__."/../../../app/config/config.php";

use Retroflix\lib\login\Customer;
    if (!(new Customer)->isLoggedIn()){
        (new Customer)->redirect();
    }

    $dados_admin = $_SESSION["customer"]["data"];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<!-- Side-bar - Retroflix -->
<body class="bg-light">
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 pt-4 mvh-100 bg-white shadow-sm">
        <div class="container">
            <div class="div d-flex flex-column align-items-center justify-content-center mt-4 gap-2">
                <img style="width: 48px;" src="..\..\..\assets\img\avatar img.png" alt="">
                <div class="texts div d-flex flex-column align-items-center justify-content-center">
                    <h6> <?= $dados_admin["nome"] ?></h6>
                    <p class="small">Meu Perfil</p>
                </div>
            </div>
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100" id="menu">
                    <!-- Home - Retroflix -->
                    <li class="nav-item w-100 ">
                        <a href="/cliente/minha-conta/" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Início</span>
                        </a>
                    </li>
                    <li class="nav-item w-100 ">
                        <a href="/cliente/minha-conta/perfil/" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Meu perfil</span>
                        </a>
                    </li>
                    <!-- Funções fundamentais -->
                    <li class="nav-item w-100">
                        <a href="/cliente/minha-conta/locacoes/" class="nav-link align-middle px-0">
                            <i class="fs-4 bi bi-camera-reels"></i> <span class="ms-1 d-none d-sm-inline">Locações</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a href="/cliente/minha-conta/logout/" class="nav-link align-middle px-0">
                            <i class="fs-4 bi bi bi-box-arrow-right"></i> <span class="ms-1 d-none d-sm-inline">Sair</span>
                        </a>
                    </li>
            </div>
        </div>
    </div>
</body>

</html>