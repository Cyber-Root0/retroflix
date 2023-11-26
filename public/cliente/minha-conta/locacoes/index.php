<?php

require __DIR__."/../../../../vendor/autoload.php";
require_once __DIR__."/../../../../app/config/config.php";

use Retroflix\lib\login\Customer;
use Retroflix\models\locacao\Locacao;
//verificação se ja esta logado
if (!(new Customer)->isLoggedIn()){
    (new Customer)->redirect();
}
$status = [
    "Pendente",
    "Pago"
];
$idCliente = (int) $_SESSION["customer"]["data"]['codigo'];
$locacaoModel = new Locacao();
$locacoes = $locacaoModel->getAllWithRelationByClientID($idCliente);


?>

<!DOCTYPE html>

<body>
    <!-- Body -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Chamando a Side-Bar do sistema -->
            <?php require("../../componentes/side-bar.php"); ?>

            <!-- Conteúdo do site -->
            <div class="col-auto col-md-9 ms-5 mt-4 bg-light py-3">
                <h2>Minhas Locações</h2>
                <p class="text-body small">
                    Confira os mais recentes resultados obtidos.
                </p>

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
                                <?php foreach($locacoes as $locacao): ?>
                                <tr>
                                    <td scope="row"><?= $locacao["nome_cliente"] ?></td>
                                    <td><?= $locacao["data_locacao"] ?></td>
                                    <td><?= $status[$locacao["status_atual"]] ?></td>
                                    <td><?= $locacao["forma_pagamento"] ?></td>
                                    <td>R$ <?= $locacao["total"] ?></td>
                                </tr>
                                <?php endforeach; ?>
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
