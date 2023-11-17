<?php
    require __DIR__."/../../../../vendor/autoload.php";
    require __DIR__."/../../../../app/config/config.php";

    use Retroflix\models\filme\Filme;
    use Retroflix\Entity\filme\Filme as FilmeEntity;
    use Retroflix\lib\login\Admin;
    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }
    if (isset($_GET["codigo"])) {
        $idFilme = $_GET['codigo'];
        $filme = new Filme();

        $validarDelete =  $filme->delete($idFilme);
        

        if ($validarDelete){
            header("Location: /admin/dashboard/filmes/");
        }
        else {
            echo "Não foi possível excluir este registro.";
        }

    }

?>