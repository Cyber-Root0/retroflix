<?php
    require __DIR__."/../../../../vendor/autoload.php";
    require __DIR__."/../../../../app/config/config.php";

 
    use Retroflix\models\locacao\Locacao;
    use Retroflix\Entity\locacao\Locacao as LocacaoEntity;
    use Retroflix\lib\login\Admin;
    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }

    if (isset($_GET["id"])) {
        $idlocacao = $_GET['id'];
        $locacao = new Locacao();
        $validarDelete =  $locacao->delete($idlocacao);
        
        if ($validarDelete){
            header("Location: /admin/dashboard/locacoes/");
        }
        else {
            echo "Não foi possível excluir este registro.";
        }

    }

?>