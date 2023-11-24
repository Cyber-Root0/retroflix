<?php

require __DIR__."/../../../vendor/autoload.php";
require_once __DIR__."/../../../app/config/config.php";
use Retroflix\lib\login\Admin;
    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }

?>

<!DOCTYPE html>

<body>
    <!-- Body -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Chamando a Side-Bar do sistema -->
            <?php require("componentes/side-bar.php"); ?>

            <!-- Conteúdo do site -->
            <div class="col-auto col-md-9 ms-5 mt-4 bg-light py-3">
                <h2>Dashboard</h2>
                <p class="text-body small">
                    Confira os mais recentes resultados obtidos.
                </p>

                <!-- Cards de destaques - Dashboard -->
                <div class="cards-containers gap-4 d-flex flex-row align-items-center py-2">
                    <div class="card w-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="py-1">
                                <h2 class="text-success">{210}</h2>
                                <p>Filmes cadastrados</p>
                                <a href="public\admin\dashboard\filmes\index.php">
                                    <button class="btn btn-primary btn-sm">Conferir detalhes</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card w-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="py-1">
                                <h2 class="text-success">{10}</h2>
                                <p>Clientes cadastrados</p>
                                <a href="public\admin\dashboard\clientes\index.php">
                                    <button class="btn btn-primary btn-sm">Conferir detalhes</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card w-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="py-1">
                                <h2 class="text-success">{R$ 2.197,00}</h2>
                                <p>Faturamento</p>
                                <a href="public\admin\dashboard\locacoes\index.php">
                                    <button class="btn btn-primary btn-sm">Conferir detalhes</button>
                                </a>
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
                </div>
            </div>


            </div>
        </div>
    </div>

</body>

</html>
