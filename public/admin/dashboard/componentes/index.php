<?php
 require __DIR__."/../../../../vendor/autoload.php";
 require __DIR__."/../../../../app/config/config.php";
use Retroflix\lib\login\Admin;
    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }

?>
<!DOCTYPE html>

<body>
    <!-- Teste dos componentes do Sistema -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php require("side-bar.php"); ?>

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