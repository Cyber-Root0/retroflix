
<?php
    require __DIR__."/../../../../vendor/autoload.php";
    require __DIR__."/../../../../app/config/config.php";

    use Retroflix\models\administrador\Administrador;
    use Retroflix\Entity\administrador\Administrador as AdministradorEntity;
    use Retroflix\lib\login\Admin;
    $loginManger = new Admin();
    if (!$loginManger->isLoggedIn()){
        $loginManger->redirect();
    }
    $administrador = new Administrador();
    $administradorEntity = new AdministradorEntity();

    if ($_SERVER['REQUEST_METHOD'] == "POST" ){

        $administradorEntity->nome = $_POST["filtro"];
    
        $administradores = $administrador->find($administradorEntity);
    }
    else{
        $administradores = $administrador->getAll();
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
                <h2>Administradores</h2>

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
                                        <a href="create.php" class="btn btn-primary">Cadastrar administrador</a>
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
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php foreach($administradores as $administrador) { ?>
                                        <tr>
                                            <td scope="row"><?= $administrador['codigo'] ?></td>
                                            <td scope="row"><?= $administrador['nome'] ?></td>
                                            <td><?= $administrador['email'] ?></td>
                                            <td><?= $administrador['cpf'] ?></td>
                                            <td><?= $administrador['telefone'] ?></td>
                                            <td><?= $administrador['sexo'] ?></td>
                                            <td><?= $administrador['data_nascimento'] ?></td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-sm ml-2" href="update.php?codigo=<?= $administrador['codigo'] ?>">
                                                    <i class="fas fa-edit"></i> Alterar
                                                </a>
                                                <a type="button" class="btn btn-outline-danger btn-sm ml-2" href="delete.php?codigo=<?= $administrador['codigo'] ?>"><i class="fas fa-trash-alt"></i> Excluir</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
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