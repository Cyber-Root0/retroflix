<?php
require __DIR__."/../../vendor/autoload.php";
require_once __DIR__."/../../app/config/config.php";

use Retroflix\models\filme\Filme;
use Retroflix\Entity\filme\Filme as EntityFilme;

/* não vamos usar a Entity do filme, pois vamos apenas selecionar o filme na Model */

$Filme = new Filme();

$Filmes = $Filme->getAllWithRelation();

$EntityFilme = new EntityFilme();

if(isset($_GET["pesquisa"])) {
    $EntityFilme->pesquisa = $_GET['pesquisa'];
    $TermoDePesquisa = $_GET['pesquisa'];
    $Filmes = $Filme->findRelation($EntityFilme);
}

//var_dump( $Filmes );

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retroflix | Filmes</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/filmes/">Retroflix</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Adicione mais itens de menu conforme necessário -->

                    <!-- Formulário de pesquisa -->
                    <li class="nav-item">
                        <form class="d-flex" action="">
                            <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" name = "pesquisa" id = "pesquisa">
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Body -->
    <div class="container-fluid" >
        <div class="row flex-nowrap" width = "100%">

            <!-- Conteúdo do site -->
            <div class="col-md-9 ms-5 bg-light py-3">
                <h2>Dashboard</h2>
                <p class="text-body small">
                    Resultados de Pesquisa: <?php 
                    if(isset($TermoDePesquisa)) {
                        echo htmlspecialchars($TermoDePesquisa);
                        //echo $TermoDePesquisa;
                    }
                    ?>
                </p>
                
                <div class="row">
                <!-- iniciamos o foreach -->
                <?php foreach( $Filmes as $filme ) :  ?> 
                    <div class="col-md-4 d-inline-block">
                        <div class="card" style="width: 18rem;">
                            <img src="/media/capas/<?= $filme["imagem_capa"] ?>" class="card-img-top" alt="..." height="300" width="120">
                            <div class="card-body">
                                <h5 class="card-title"> <?= $filme["titulo"] ?> </h5>
                                <p class="card-text"><?= substr($filme["sinopse"] , 0 , 100) ?></p>
                                <section>
                                    <h5 display = "inline">Diretor: <?= $filme["nome_diretor"] ?></h5>
                                    <h5 display = "inline">Gênero: <?= $filme["nome_genero"] ?></h5>
                                </section>
                                <a href="#" class="btn btn-primary">Veja Mais</a>
                            </div>
                        </div>
                    </div>
                
                <?php endforeach;  ?> <!-- terminamos a exibicação dos filmes-->
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
