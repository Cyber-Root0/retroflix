<?php

require __DIR__."/../../../../vendor/autoload.php";
require __DIR__."/../../../../app/config/config.php";
use Retroflix\models\fpagamento\FPagamento;
use Retroflix\lib\login\Admin;
    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }
if(isset($_GET['id'])){
    $idFp = (int) $_GET['id'];
    $fp = new FPagamento();
    $IsDeleted = $fp->delete($idFp);

    if($IsDeleted){
        header('Location: /admin/dashboard/pagamentos/');
    }
    else{
        echo "Não foi possível deletar o registro";
    }

}

