<?php
require __DIR__ . "/../../vendor/autoload.php";
require_once __DIR__ . "/../../app/config/config.php";

use Retroflix\models\filme\Filme;
use Retroflix\Entity\filme\Filme as EntityFilme;
use Retroflix\lib\login\Customer;
$loginCustomer = new Customer();
//validações se o usuario esta logado
if (!$loginCustomer->isLoggedIn()){
    $loginCustomer->redirect();
}

/* não vamos usar a Entity do filme, pois vamos apenas selecionar o filme na Model */

$Filme = new Filme();

$Filmes = $Filme->getAllWithRelation();

$EntityFilme = new EntityFilme();

if (isset($_GET["pesquisa"])) {
    $EntityFilme->pesquisa = $_GET['pesquisa'];
    $TermoDePesquisa = $_GET['pesquisa'];
    $Filmes = $Filme->findRelation($EntityFilme);
}

?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Retroflix - Locações de Filme</title>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700&amp;display=swap">
<link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
<style>
    body {
        overflow-x: hidden;
    }

    .video-container {
        width: 100vw;
        height: 98vh;
        filter: blur(4px);
    }

    iframe {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100vw;
        height: 100vh;
        transform: translate(-50%, -50%);
        pointer-events: none;
    }

    #content {
        position: absolute;
        color: #FFFFFF;
        left: 20%;
        top: 50%;
        width: 30vw;
        transform: translate(-50%, -50%);
    }

    .container_descricao a {
        padding: 5px 20px;
        font-size: 14px;
    }

    @media (min-aspect-ratio: 16/9) {
        .video-container iframe {
            height: 56.25vw;
        }
    }

    @media (max-aspect-ratio: 16/9) {
        .video-container iframe {
            width: 177.78vh;
        }
    }
    .sbx-twitter {
  display: inline-block;
  position: relative;
  width: 200px;
  height: 33px;
  white-space: nowrap;
  box-sizing: border-box;
  font-size: 12px;
}

.sbx-twitter__wrapper {
  width: 100%;
  height: 100%;
}

.sbx-twitter__input {
  display: inline-block;
  -webkit-transition: box-shadow .4s ease, background .4s ease;
  transition: box-shadow .4s ease, background .4s ease;
  border: 0;
  border-radius: 17px;
  box-shadow: inset 0 0 0 1px #E1E8ED;
  background: #F5F8FA;
  padding: 0;
  padding-right: 52px;
  padding-left: 16px;
  width: 100%;
  height: 100%;
  vertical-align: middle;
  white-space: normal;
  font-size: inherit;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
}

.sbx-twitter__input::-webkit-search-decoration, .sbx-twitter__input::-webkit-search-cancel-button, .sbx-twitter__input::-webkit-search-results-button, .sbx-twitter__input::-webkit-search-results-decoration {
  display: none;
}

.sbx-twitter__input:hover {
  box-shadow: inset 0 0 0 1px #c1d0da;
}

.sbx-twitter__input:focus, .sbx-twitter__input:active {
  outline: 0;
  box-shadow: inset 0 0 0 1px #D6DEE3;
  background: #FFFFFF;
}

.sbx-twitter__input::-webkit-input-placeholder {
  color: #9AAEB5;
}

.sbx-twitter__input::-moz-placeholder {
  color: #9AAEB5;
}

.sbx-twitter__input:-ms-input-placeholder {
  color: #9AAEB5;
}

.sbx-twitter__input::placeholder {
  color: #9AAEB5;
}

.sbx-twitter__submit {
  position: absolute;
  top: 0;
  right: 0;
  left: inherit;
  margin: 0;
  border: 0;
  border-radius: 0 16px 16px 0;
  background-color: rgba(62, 130, 247, 0);
  padding: 0;
  width: 33px;
  height: 100%;
  vertical-align: middle;
  text-align: center;
  font-size: inherit;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.sbx-twitter__submit::before {
  display: inline-block;
  margin-right: -4px;
  height: 100%;
  vertical-align: middle;
  content: '';
}

.sbx-twitter__submit:hover, .sbx-twitter__submit:active {
  cursor: pointer;
}

.sbx-twitter__submit:focus {
  outline: 0;
}

.sbx-twitter__submit svg {
  width: 13px;
  height: 13px;
  vertical-align: middle;
  fill: #657580;
}

.sbx-twitter__reset {
  display: none;
  position: absolute;
  top: 7px;
  right: 33px;
  margin: 0;
  border: 0;
  background: none;
  cursor: pointer;
  padding: 0;
  font-size: inherit;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  fill: rgba(0, 0, 0, 0.5);
}

.sbx-twitter__reset:focus {
  outline: 0;
}

.sbx-twitter__reset svg {
  display: block;
  margin: 4px;
  width: 11px;
  height: 11px;
}

.sbx-twitter__input:valid ~ .sbx-twitter__reset {
  display: block;
  -webkit-animation-name: sbx-reset-in;
          animation-name: sbx-reset-in;
  -webkit-animation-duration: .15s;
          animation-duration: .15s;
}

@-webkit-keyframes sbx-reset-in {
  0% {
    -webkit-transform: translate3d(-20%, 0, 0);
            transform: translate3d(-20%, 0, 0);
    opacity: 0;
  }
  100% {
    -webkit-transform: none;
            transform: none;
    opacity: 1;
  }
}

@keyframes sbx-reset-in {
  0% {
    -webkit-transform: translate3d(-20%, 0, 0);
            transform: translate3d(-20%, 0, 0);
    opacity: 0;
  }
  100% {
    -webkit-transform: none;
            transform: none;
    opacity: 1;
  }
}
.searchbar{
    display: flex;
    align-items: center;
}
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
</style>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="77">

   <?php require("../cliente/componentes/nav-bar.php") ?>

    <div class="video-container">
        <iframe
            src="https://www.youtube.com/embed/2NKtkc7rffM?controls=0&autoplay=1&mute=1&playsinline=1&loop=1"></iframe>
    </div>
    <div id="content">
        <div class="container_descricao">
            <h2 class="descricao_titulo">Assista a 2° temporadora Agora</h2>
            <p class="descricao_texto"> Aproveite a tela grande da TV ou assista no tablet, laptop, celular e outros
                aparelhos. Nossa seleção de cursos não para de crescer.</p>
            <a href="#" class="btn btn-lg btn-light"> Assistir <i class="bi bi-play-fill"></i></a>
            <a href="#" class="btn btn-lg btn-light"> Mais informações <i class="bi bi-play-fill"></i></a>
        </div>
    </div>
    <!-- Body -->
    <div class="container" style="display: flex; gap: 20px; flex-wrap: wrap">
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
                <a href="/filmes/cart/?add=<?= $filme["codigo"] ?>" class="btn btn-primary w-100" style="margin-top: 20px;">Locar</a>
            </div>
        </div>

        <?php endforeach; ?>
    </div>


    <!--
        <header class="font-monospace text-lowercase fw-bold masthead" style="background: url(&quot;assets/img/background_retroflix.jpg&quot;) no-repeat;box-shadow: inset 118px 34px 114px 18px rgb(0,0,0);background-size: cover;">
            <div class="intro-body" style="box-shadow: inset 0px -100px 100px 5px rgb(0,0,0);">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h1 class="brand-heading" style="text-shadow: 0px 0px;">Retroflix</h1>
                            <p class="text-light intro-text"><br>Acompanhe os filmes que você assistiu.<br>Salve aqueles que você deseja ver.<br>Diga aos seus amigos o que é bom.<br></p><a class="btn btn-link btn-circle" role="button" href="#about"><i class="fa fa-angle-double-down animated"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="text-center border-3 d-lg-flex d-xxl-flex justify-content-center align-items-center align-content-center flex-wrap justify-content-lg-center align-items-lg-center justify-content-xxl-center align-items-xxl-end content-section" id="about" style="background: #14181c;padding: 50px;gap: 50px;">
            <button class="btn btn-primary link-light" type="button" style="background: #00b020;border-radius: 19px;border-width: 0px;padding-top: 6px;padding-bottom: 6px;padding-right: 40px;padding-left: 40px;" onclick="document.location='/cliente/'">ASSISTA AGORA</button>
            <div class="container d-flex flex-column" style="gap:20px">
                <div class="card-group" style="padding-right: -1px; gap:20px">
                    <div class="card"><img class="card-img-top w-100 d-block" src="/assets/img/a-felicidade-nao-se-compra.jpg"></div>
                    <div class="card"><img class="card-img-top w-100 d-block" src="/assets/img/casablanca.jpg"></div>
                    <div class="card"><img class="card-img-top w-100 d-block" src="/assets/img/escravos_da_terra.jpg"></div>
                    <div class="card"><img class="card-img-top w-100 d-block" src="/assets/img/o_picolino.jpg"></div>
                    <div class="card"><img class="card-img-top w-100 d-block" src="/assets/img/a-felicidade-nao-se-compra.jpg"></div>
                    <div class="card"><img class="card-img-top w-100 d-block" src="/assets/img/casablanca.jpg"></div>
                
                </div>
                <div class="card-group" style="padding-right: -1px; gap:20px">
                    <div class="card"><img class="card-img-top w-100 d-block" src="/assets/img/a-felicidade-nao-se-compra.jpg"></div>
                    <div class="card"><img class="card-img-top w-100 d-block" src="/assets/img/casablanca.jpg"></div>
                    <div class="card"><img class="card-img-top w-100 d-block" src="/assets/img/escravos_da_terra.jpg"></div>
                    <div class="card"><img class="card-img-top w-100 d-block" src="/assets/img/o_picolino.jpg"></div>
                    <div class="card"><img class="card-img-top w-100 d-block" src="/assets/img/a-felicidade-nao-se-compra.jpg"></div>
                    <div class="card"><img class="card-img-top w-100 d-block" src="/assets/img/casablanca.jpg"></div>
                
                </div>
            </div>
        </section>
-->
    <div class="map-clean"></div>
    <footer style="padding-top: 20px;padding-bottom: 20px;">
        <div class="container text-center">
            <p>Retroflix © 2023</p>
        </div>
    </footer>
</body>

</html>