<?php

require __DIR__."/../../../vendor/autoload.php";
require __DIR__."/../../../app/config/config.php";
use Retroflix\lib\login\Admin;
    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white shadow-sm">
                <div class="div d-flex flex-column align-items-center justify-content-center mt-4 gap-2">
                    <img style="width: 48px;" src="assets\img\avatar img.png" alt="">
                    <div class="texts div d-flex flex-column align-items-center justify-content-center">
                        <h6>Gabriel Simionato</h6>
                        <p class="small">Administrador</p>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100" id="menu">
                        <!-- Home - Retroflix -->
                        <li class="nav-item w-100 ">
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Início</span>
                            </a>
                        </li>
                        <!-- Gerenciar -->
                        <li class="nav-item w-100">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi bi-pencil-square"></i> <span class="ms-1 d-none d-sm-inline">Gerenciar</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0 text-body"> <span class="d-none d-sm-inline">Administradores</span></a>
                                </li>
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0 text-body"> <span class="d-none d-sm-inline">Clientes</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0 text-body"> <span class="d-none d-sm-inline">Gêneros</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0 text-body"> <span class="d-none d-sm-inline">Diretores</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0 text-body"> <span class="d-none d-sm-inline">Formas de pagamento</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0 text-body"> <span class="d-none d-sm-inline">Filmes</span></a>
                                </li>
                            </ul>
                        </li>
                        <!-- Funções fundamentais -->
                        <li class="nav-item w-100">
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fs-4 bi bi-camera-reels"></i> <span class="ms-1 d-none d-sm-inline">Locações</span>
                            </a>
                        </li>
                </div>
            </div>

            <!-- Conteúdo do site -->
            <div class="col-auto col-md-9 ms-5 bg-light py-3">
                <h2>Dashboard</h2>
                <p class="text-body small">
                    Confira os mais recentes resultados obtidos.
                </p>

                <!-- Cards de destaques - Dashboard -->
                <div class="cards-containers gap-4 d-flex flex-row align-items-center py-2">
                    <div class="card w-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="py-1">
                                <h2 class="text-success">+210</h2>
                                <p>Filmes locados</p>
                                <button class="btn btn-primary btn-sm">Conferir detalhes</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="py-1">
                                <h2 class="text-success">+10</h2>
                                <p>Novos usuários</p>
                                <button class="btn btn-primary btn-sm">Conferir detalhes</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="py-1">
                                <h2 class="text-success">R$ 2.197,00</h2>
                                <p>Lucro gerado</p>
                                <button class="btn btn-primary btn-sm">Conferir detalhes</button>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- Tabela de destaque - Locações recentes -->
                <div class="mt-5">
                    <h5>Locações recentes</h5>
                    <div class="shadow-sm">
                        <table class="table table-hover  rounded">
                            <thead class="bg-white">
                                <tr>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Forma pagamento</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                <tr>
                                    <td scope="row">Bruno Alves</td>
                                    <td>05/11/2023</td>
                                    <td>Pago</td>
                                    <td>Cartão de Crédito</td>
                                    <td>R$ 17,80</td>
                                </tr>
                                <tr>
                                    <td scope="row">Gabriel Brandão</td>
                                    <td>04/11/2023</td>
                                    <td>Pago</td>
                                    <td>Cartão de Débito</td>
                                    <td>R$ 22,40</td>
                                </tr>
                                <tr>
                                    <td scope="row">Gracielle</td>
                                    <td>03/11/2023</td>
                                    <td>Pendente</td>
                                    <td>Boleto</td>
                                    <td>R$ 18,20</td>
                                </tr>
                                <tr>
                                    <td scope="row">Francielle</td>
                                    <td>01/11/2023</td>
                                    <td>Pago</td>
                                    <td>Cartão de Débito</td>
                                    <td>R$ 28,99</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</body>

</html>