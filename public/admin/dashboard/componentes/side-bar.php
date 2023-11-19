<?php
 require_once __DIR__."/../../../../vendor/autoload.php";
 require_once __DIR__."/../../../../app/config/config.php";
use Retroflix\lib\login\Admin;
    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }

    $dados_admin = $_SESSION["admin"]["data"];

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
                    <p class="small">Administrador</p>
                </div>
            </div>
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100" id="menu">
                    <!-- Home - Retroflix -->
                    <li class="nav-item w-100 ">
                        <a href="/admin/dashboard/" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Início</span>
                        </a>
                    </li>
                    <!-- Gerenciar -->
                    <li class="nav-item w-100">
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi bi-pencil-square"></i> <span class="ms-1 d-none d-sm-inline">Gerenciar</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="/admin/dashboard/admins/index.php" class="nav-link px-0 text-body"> <span class="d-none d-sm-inline">Administradores</span></a>
                            </li>
                            <li class="w-100">
                                <a href="/admin/dashboard/clientes/" class="nav-link px-0 text-body"> <span class="d-none d-sm-inline">Clientes</span></a>
                            </li>
                            <li>
                                <a href="/admin/dashboard/generos/" class="nav-link px-0 text-body"> <span class="d-none d-sm-inline">Gêneros</span></a>
                            </li>
                            <li>
                                <a href="/admin/dashboard/diretores/" class="nav-link px-0 text-body"> <span class="d-none d-sm-inline">Diretores</span></a>
                            </li>
                            <li>
                                <a href="/admin/dashboard/pagamentos/" class="nav-link px-0 text-body"> <span class="d-none d-sm-inline">Formas de pagamento</span></a>
                            </li>
                            <li>
                                <a href="/admin/dashboard/filmes/" class="nav-link px-0 text-body"> <span class="d-none d-sm-inline">Filmes</span></a>
                            </li>
                        </ul>
                    </li>
                    <!-- Funções fundamentais -->
                    <li class="nav-item w-100">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi bi-camera-reels"></i> <span class="ms-1 d-none d-sm-inline">Locações</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a href="/admin/dashboard/logout/" class="nav-link align-middle px-0">
                            <i class="fs-4 bi bi bi-box-arrow-right"></i> <span class="ms-1 d-none d-sm-inline">Sair</span>
                        </a>
                    </li>
            </div>
        </div>
    </div>
</body>

</html>