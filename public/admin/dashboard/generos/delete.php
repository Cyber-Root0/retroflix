<?php

require __DIR__."/../../../../vendor/autoload.php";
require __DIR__."/../../../../app/config/config.php";
use Retroflix\models\genero\Genero; // Alterado para a classe de Gênero
use Retroflix\lib\login\Admin;
    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }
if (isset($_GET["id"])) {
    $idGenero = (int) $_GET['id'];
    $genero = new Genero();   
    $isDeleted =  $genero->delete($idGenero);

    if ($isDeleted) {
        header('Location: /admin/dashboard/generos/');
    } else {
        echo "Não foi possível deletar o registro";
    }
}
