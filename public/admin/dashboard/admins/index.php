
<?php

    require __DIR__."/../../../../vendor/autoload.php";
    require __DIR__."/../../../../app/config/config.php";

    use Retroflix\models\administrador\Administrador;
    use Retroflix\Entity\administrador\Administrador as AdministradorEntity;

    $administrador = new AdministradorEntity();
    $administrador->nome = "Gabriel";
    $administrador->email = "gabriel252004@outlook.com";
    $administrador->senha = "senha1234";
    $administrador->cpf = "999.999.999-99";
    $administrador->telefone = "(99) 99999-9999";
    $administrador->sexo = "m";
    $administrador->data_nascimento = new DateTime("2023-12-11");

    $administradorModel = new Administrador();
    $result = $administradorModel->create($administrador);
    var_dump($result);
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
                                        <input type="text" class="form-control w-100" name="" id="">
                                    </div>
                                    <div class="div">
                                        <a href="create.php" class="btn btn-primary">Cadastrar administrador</a>
                                    </div>
                                </div>
                                <table class="table table-hover rounded">
                                    <thead class="bg-dark text-white">
                                        <tr>
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
                                        <tr>
                                            <td scope="row">Gabriel Simionato</td>
                                            <td>gabriel252004@outlook.com</td>
                                            <td>999.999.999-99</td>
                                            <td>(99) 99999-9999</td>
                                            <td>Masculino</td>
                                            <td>25/04/2004</td>
                                            <td>exemploSenhaADM123!@</td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-sm ml-2"><i class="fas fa-edit"></i> Alterar</a>
                                                <a type="button" class="btn btn-outline-danger btn-sm ml-2"><i class="fas fa-trash-alt"></i> Excluir</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Gabriel Brandão</td>
                                            <td>brandao@outlook.com</td>
                                            <td>999.999.999-99</td>
                                            <td>(99) 99999-9999</td>
                                            <td>Masculino</td>
                                            <td>25/04/2004</td>
                                            <td>exemploSenhaADM123!@</td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-sm ml-2"><i class="fas fa-edit"></i> Alterar</a>
                                                <a type="button" class="btn btn-outline-danger btn-sm ml-2"><i class="fas fa-trash-alt"></i> Excluir</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Gracielle</td>
                                            <td>graci@outlook.com</td>
                                            <td>999.999.999-99</td>
                                            <td>(99) 99999-9999</td>
                                            <td>Masculino</td>
                                            <td>25/04/2004</td>
                                            <td>exemploSenhaADM123!@</td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i> Alterar</a>
                                                <a type="button" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i> Excluir</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Francielle</td>
                                            <td>fran@outlook.com</td>
                                            <td>999.999.999-99</td>
                                            <td>(99) 99999-9999</td>
                                            <td>Masculino</td>
                                            <td>25/04/2004</td>
                                            <td>exemploSenhaADM123!@</td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-sm ml-2"><i class="fas fa-edit"></i> Alterar</a>
                                                <a type="button" class="btn btn-outline-danger btn-sm ml-2"><i class="fas fa-trash-alt"></i> Excluir</a>
                                            </td>
                                        </tr>
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