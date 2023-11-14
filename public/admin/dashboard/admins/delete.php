<?php
    require __DIR__."/../../../../vendor/autoload.php";
    require __DIR__."/../../../../app/config/config.php";

    use Retroflix\models\administrador\Administrador;
    use Retroflix\Entity\administrador\Administrador as AdministradorEntity;


    if (isset($_GET["codigo"])) {
        $idAdministrador = $_GET['codigo'];
        $administrador = new Administrador();

        $validarDelete =  $administrador->delete($idAdministrador);
        

        if ($validarDelete){
            header("Location: /admin/dashboard/admins/");
        }
        else {
            echo "Não foi possível excluir este registro.";
        }

    }

?>