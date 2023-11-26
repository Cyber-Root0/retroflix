<?php

require __DIR__."/../../../../vendor/autoload.php";
require __DIR__."/../../../../app/config/config.php";
use Retroflix\models\locacao\Locacao;
use Retroflix\Entity\cliente\Cliente;
use Retroflix\lib\login\Admin;

    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }
    $status = [
        "Pendente",
        "Pago"
    ];
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $cliente = new Cliente();
    $cliente->nome = $_POST["filtro"];
    $locacaoModel = new Locacao();
    $locacoes = $locacaoModel->find($cliente);

}
else{
    $locacaoModel = new Locacao();
    $locacoes = $locacaoModel->getAllWithRelation();
}

?>

<!DOCTYPE html>

<body>
    <!-- Body -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Chamando a Side-Bar do sistema -->
            <?php require("..\componentes\side-bar.php"); ?>

            <!-- Conteúdo do site -->
            <div class="col-auto col-md-9 ms-5 mt-4 bg-light py-3">
                <h2>Locações
                </h2>

                <!-- Breadcrumb -->
                <nav class="mt-4 mb-2" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">

                </nav>

                <!-- Container geral -->
                <div class="container d-flex bg-white ms-0 py-4 px-4 rounded shadow-sm">
                    <form action="" method="post" class="gap-2 w-100">

                        <!-- Título -->
                        <div class="title pb-2">
                            <h3>Gerenciar</h3>
                        </div>

                        <!-- Tabelas -->
                        <div class="mt-2">
                            <div class="">
                                <div class="div d-flex justify-content-between mb-3">
                                    <div class="d-flex flex-row align-items-center">
                                        <p class="m-0 flex-fill">Filtrar por:</p>
                                        <input type="text" class="form-control w-100" name="filtro" id="">
                                    </div>
                                    <!--
                                    <div class="div">
                                        <a href="create.php" class="btn btn-primary">Geren</a>
                                    </div>
                                    -->
                                </div>
                                <table class="table table-hover rounded">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th scope="col">Código</th>
                                            <th scope="col">Data</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Forma Pagamento</th>
                                            <th scope="col">Status Atual</th>
                                            <th scope="col">Total</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php foreach ($locacoes as $locacao): ?>
                                        <tr>
                                            <td scope="row"><?= $locacao["codigo_locacao"] ?></td>
                                            <td><?= $locacao["data_locacao"] ?></td>
                                            <td><?= $locacao["nome_cliente"] ?></td>
                                            <td><?= $locacao["forma_pagamento"] ?></td>
                                            <td><?= $status[$locacao["status_atual"]] ?></td>
                                            <td>R$ <?= $locacao["total"] ?></td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-sm ml-2" href="update.php?id=<?= $locacao['codigo_locacao'] ?>">
                                                    <i class="fas fa-edit"></i> Alterar
                                                </a>
                                                <a type="button" class="btn btn-outline-danger btn-sm ml-2" href="delete.php?id=<?= $locacao['codigo_locacao'] ?>">
                                                    <i class="fas fa-trash-alt"></i> Excluir
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>