<?php

require __DIR__."/../../../vendor/autoload.php";
require_once __DIR__."/../../../app/config/config.php";
use Retroflix\models\filmeslocacao\filmeslocacao;
use Retroflix\lib\login\Customer;
if (!(new Customer)->isLoggedIn()){
    (new Customer)->redirect();
}

$idcliente = (int) $_SESSION["customer"]["data"]['codigo'];
$filmeslocacaoModel = new filmeslocacao();
$Filmes = $filmeslocacaoModel->getAllRelationByClienteID($idcliente);


?>

<!DOCTYPE html>

<body>
    <style>
        .card {
        color: black;
        width: 328px;
        min-height: 328px !important;
        max-height: 475px !important;
    }
   .card .card-img-top{
        height: 200px;
        width: 100%;
   }
   .card .additional_info{
    display: flex;
    justify-content: center;
    font-size: 12px;
    color: red;
    margin-top: 50px;
    /* left: 5px; */
   }
   .card_filmes{
    width: 100%;
    height: 100%;
    display: flex;
    gap: 33px;
   }
    </style>
    <!-- Body -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Chamando a Side-Bar do sistema -->
            <?php require("../componentes/side-bar.php"); ?>

            <!-- Conteúdo do site -->
            <div class="col-auto col-md-9 ms-5 mt-4 bg-light py-3">
                <h2>Meus Filmes</h2>
                <p class="text-body small">
                    Confira os mais recentes resultados obtidos.
                </p>
                <div style="width:100%; height:100%" class="card_filmes">

                <?php  foreach($Filmes as $filme): ?>
                
                <div class="card">
                    <img class="card-img-top" src="/media/capas/<?= $filme["imagem_capa"] ?>"  alt="Card image cap">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= $filme["titulo"] ?></h5>
                        <p class="card-text"><?= substr($filme["sinopse"],0,100) ?></p>
                        <div class="div">
                            <span class="badge bg-dark">Gênero: <?= $filme["nome_genero"] ?></span>
                            <span class="badge bg-dark">Diretor: <?= $filme["nome_diretor"] ?></span>
                        </div>
                        <a href="/cliente/minha-conta/assistir/?movie=<?= $filme["codigo_filme"] ?>" class="btn btn-primary w-100" style="margin-top: 20px;">Assistir</a>
                    </div>
                </div>

                <?php endforeach; ?>



                </div>
                
            </div>


            </div>
        </div>
    </div>

</body>

</html>
