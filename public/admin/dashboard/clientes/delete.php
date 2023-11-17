<?php
    require __DIR__."/../../../../vendor/autoload.php";
    require __DIR__."/../../../../app/config/config.php";

 
    use Retroflix\models\cliente\ClienteModel;
    use Retroflix\Entity\cliente\Cliente as ClienteEntity;
    use Retroflix\lib\login\Admin;
    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }

    if (isset($_GET["codigo"])) {
        $idCliente = $_GET['codigo'];
        $cliente = new ClienteModel();
        $validarDelete =  $cliente ->delete($idCliente);
        

        if ($validarDelete){
            header("Location: /admin/dashboard/clientes/");
        }
        else {
            echo "Não foi possível excluir este registro.";
        }

    }

?>