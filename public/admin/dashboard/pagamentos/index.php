<?php

require __DIR__."/../../../../vendor/autoload.php";
require __DIR__."/../../../../app/config/config.php";
use Retroflix\models\fpagamento\FPagamento;
use Retroflix\Entity\fpagamento\FPagamento as FPagamentoEntity;

$fp = new FPagamento();
$fpagamentoEntity = new FPagamentoEntity();
use Retroflix\lib\login\Admin;
    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $fpagamentoEntity->descricao = $_POST["filtro"];

    $fpagamentos = $fp->find($fpagamentoEntity);
}
else{
    $fpagamentos = $fp->getAll();
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
                <h2>Formas de Pagamentos</h2>

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
                                    <div class="div">
                                        <a href="create.php" class="btn btn-primary">Cadastrar Forma de Pagamento</a>
                                    </div>
                                </div>
                                <table class="table table-hover rounded">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th scope="col">Código</th>
                                            <th scope="col">Descricao</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php foreach ($fpagamentos as $fp): ?>
                                        <tr>
                                            <td scope="row"> <?= $fp['codigo'] ?> </td>
                                            <td> <?= $fp['descricao'] ?> </td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-sm ml-2" href="update.php?id=<?= $fp['codigo'] ?>">
                                                    <i class="fas fa-edit"></i> Alterar
                                                </a>
                                                <a type="button" class="btn btn-outline-danger btn-sm ml-2" href="delete.php?id=<?= $fp['codigo'] ?>">
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