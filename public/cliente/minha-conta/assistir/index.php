<?php

require __DIR__."/../../../../vendor/autoload.php";
require_once __DIR__."/../../../../app/config/config.php";
use Retroflix\models\filmeslocacao\filmeslocacao;
use Retroflix\models\filme\Filme;
use Retroflix\lib\login\Customer;
if (!(new Customer)->isLoggedIn() || !isset($_GET['movie']) ){
    (new Customer)->redirect();
}

$idcliente = (int) $_SESSION["customer"]["data"]['codigo'];
$filmeslocacaoModel = new filmeslocacao();
$Filmes = $filmeslocacaoModel->getAllRelationByClienteID($idcliente);
$achou = false;
foreach($Filmes as $f){
    if ($f['codigo_filme'] == (int) $_GET['movie'] ){
        $achou = true;
        break;
    }
}

if (!$achou){
    (new Customer)->redirect('/cliente/minha-conta/');
}else{
    $filme = (new Filme)->get((int) $_GET['movie']);
}


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
            <?php require("../../componentes/side-bar.php"); ?>

            <!-- Conteúdo do site -->
            <div class="col-auto col-md-9 ms-5 mt-4 bg-light py-3">
                <h2>Assistindo: <?= $filme['titulo'] ?> </h2>
                <p class="text-body small">
                </p>
                <div style="width:100%; height:100%" class="card_filmes">

                <iframe width="100%" height="70%" src="<?= $filme['link'] ?>">
                </iframe>

                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
