<?php

require __DIR__."/../../../../vendor/autoload.php";
require __DIR__."/../../../../app/config/config.php";
use Retroflix\models\diretor\Diretor;
use Retroflix\Entity\diretor\Diretor as DiretorEntity;
use Retroflix\lib\login\Admin;
    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }
//busca os dados do Diretor
if (isset($_GET["id"])) {

    $idDiretor = (int) $_GET['id'];
    $diretor = new Diretor();   
    $dados_diretor =  $diretor->get($idDiretor);
    
    //se o resultado da busca pelo id for direferente de Maior que 0. ou seja, menor ou igual a 0
    if (!count($dados_diretor) > 0){
        header("Location: /admin/dashboard/diretores/");
    }

}

//atualizar se o request for para POST

if ( $_SERVER['REQUEST_METHOD'] == "POST" ){

    $diretor = new Diretor();
    $EntityDiretor = new DiretorEntity();

    $idDiretor = (int) $_GET['id'];
    $nomeDiretor = $_POST['nome'];

   
    $EntityDiretor->codigo = $idDiretor;
    $EntityDiretor->nome = $nomeDiretor;  
    
    $result = $diretor->update($EntityDiretor);
    if ($result) {
        header('Location: /admin/dashboard/diretores/');
    }else{
        echo "não foi possivel atualizar o registro";
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
                <h2>Diretores</h2>

                <!-- Breadcrumb -->
                <nav class="mt-4 mb-2" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Diretores</a></li>
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
                                    <input type="text" name="nome" id="nome" class="form-control" 
                                    value="<?= $dados_diretor['nome'] ?>">
                                </div>
                            </div>

                            <!-- Botão Formulário -->
                            <div class="d-flex justify-content-end pt-3">
                                <div class="col-md-2 ">
                                    <input type="submit" class="w-100 btn  btn-primary" 
                                    value="Atualizar Gerente" href="">
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