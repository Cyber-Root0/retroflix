<?php

require __DIR__."/../../../../vendor/autoload.php";
require __DIR__."/../../../../app/config/config.php";
use Retroflix\models\genero\Genero; // Alterado para a classe de Gênero
use Retroflix\Entity\genero\Genero as GeneroEntity; // Alterado para a entidade de Gênero
use Retroflix\lib\login\Admin;
    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome_genero = $_POST['nome'];

    // Captura dos dados do front-end e salvamento do registro no banco de dados
    $EntityGenero = new GeneroEntity(); // Alterado para a entidade de Gênero
    $EntityGenero->nome = $nome_genero;

    $ModelGenero = new Genero(); // Alterado para a classe de Gênero
    $result = $ModelGenero->create($EntityGenero);

    // Redirecionamento quando o gênero for criado
    if ($result) {
        header("Location: /admin/dashboard/generos/"); // Alterado para a página de gêneros
    }
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
                <h2>Gêneros</h2>

                <!-- Breadcrumb -->
                <nav class="mt-4 mb-2" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Gêneros</a></li> <!-- Alterado para a página de gêneros -->
                        <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
                    </ol>
                </nav>

                <!-- Container geral -->
                <div class="container d-flex bg-white ms-0 py-4 px-4 rounded shadow-sm">
                    <form action="" method="post" class="gap-2 w-100">

                        <!-- Título -->
                        <div class="title pb-2">
                            <h3>Cadastrar</h3>
                        </div>

                        <!-- Container formulário -->
                        <div class="d-grid gap-3 d-fill">
                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group col-md-3 flex-fill">
                                    <label for="nome" class="" >Nome</label>
                                    <input type="text" name="nome" id="nome" class="form-control">
                                </div>
                            </div>

                            <!-- Botão Formulário -->
                            <div class="d-flex justify-content-end pt-3">
                                <div class="col-md-2 ">
                                    <input type="submit" class="w-100 btn  btn-primary" value="Cadastrar Gênero">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
