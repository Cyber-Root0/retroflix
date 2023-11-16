
<?php
    require __DIR__."/../../../../vendor/autoload.php";
    require __DIR__."/../../../../app/config/config.php";

    use Retroflix\models\cliente\ClienteModel;
    use Retroflix\Entity\cliente\Cliente as ClienteEntity;

    $cliente = new ClienteModel();
    $clienteEntity = new ClienteEntity();

    if ($_SERVER['REQUEST_METHOD'] == "POST" ){

        $clienteEntity->nome = $_POST["filtro"];
        $clientes = $cliente->find($clienteEntity);
    }
    else{
       $clientes = $cliente->getAll();
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
                <h2>Clientes</h2>

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
                                        <a href="create.php" class="btn btn-primary">Cadastrar Cliente</a>
                                    </div>
                                </div>
                                <table class="table table-hover rounded">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th scope="col">Código</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">E-mail</th>
                                            <th scope="col">CPF</th>
                                            <th scope="col">Telefone</th>
                                            <th scope="col">Sexo</th>
                                            <th scope="col">Data de Nascimento</th>
                                            <th scope="col">Senha</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php foreach($clientes as $cliente) { ?>
                                        <tr>
                                            <td scope="row"><?= $cliente['codigo'] ?></td>
                                            <td scope="row"><?= $cliente['nome'] ?></td>
                                            <td><?= $cliente['email'] ?></td>
                                            <td><?= $cliente['cpf'] ?></td>
                                            <td><?= $cliente['telefone'] ?></td>
                                            <td><?= $cliente['sexo'] ?></td>
                                            <td><?= $cliente['data_nascimento'] ?></td>
                                            <td><?= $cliente['senha'] ?></td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-sm ml-2" href="update.php?codigo=<?= $cliente['codigo'] ?>">
                                                    <i class="fas fa-edit"></i> Alterar
                                                </a>
                                                <a type="button" class="btn btn-outline-danger btn-sm ml-2" href="delete.php?codigo=<?= $cliente['codigo'] ?>"><i class="fas fa-trash-alt"></i> Excluir</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Anterior</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Próximo</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>



                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>