<?php

require __DIR__."/../../../../vendor/autoload.php";
require __DIR__."/../../../../app/config/config.php";
use Retroflix\models\fpagamento\FPagamento;
use Retroflix\Entity\fpagamento\FPagamento as FPagamentoEntity;

//Obtem o ID
if(isset($_GET["id"])){

    $idFp = (int) $_GET["id"];
    $fp = new FPagamento();
    $dadosFp = $fp->get($idFp);

    if(!count($dadosFp) > 0){
        header("Location: /admin/dashboard/pagamentos/");
    }
    
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $fp = new FPagamento();

    $EntityFPagamento = new FPagamentoEntity();

    $idFp = (int) $_GET['id'];
    $descricaoFp = $_POST['descricao'];

    $EntityFPagamento->codigo = $idFp;

    $EntityFPagamento->descricao = $descricaoFp;    

    $result = $fp->update($EntityFPagamento);

    if($result){
        header('Location: /admin/dashboard/pagamentos/');
    }else{
        echo "Não foi possível atualizar o registro";
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
                <h2>Formas de Pagamento</h2>

                <!-- Breadcrumb -->
                <nav class="mt-4 mb-2" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Formas de Pagamento</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
                    </ol>
                </nav>

                <!-- Container geral -->
                <div class="container d-flex bg-white ms-0 py-4 px-4 rounded shadow-sm">
                    <form action="" method="post" class="gap-2 w-100">

                        <!-- Título -->
                        <div class="title pb-2">
                            <h3>Editar</h3>
                        </div>

                        <!-- Container formulário -->
                        <div class="d-grid gap-3 d-fill">
                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group col-md-3 flex-fill">
                                    <label for="descricao" class="" >Descrição</label>
                                    <input type="text" name="descricao" id="descricao" class="form-control" 
                                    value="<?= $dadosFp['descricao'] ?>">
                                </div>
                            </div>

                            <!-- Botão Formulário -->
                            <div class="d-flex justify-content-end pt-3">
                                <div class="col-md-4 ">
                                    <input type="submit" class="w-100 btn  btn-primary" 
                                    value="Atualizar Forma de Pagamento" href="">
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