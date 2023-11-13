<?php

require __DIR__."/../../../../vendor/autoload.php";
require __DIR__."/../../../../app/config/config.php";
use Retroflix\models\diretor\Diretor;

if (isset($_GET["id"])) {
    $idDiretor = (int) $_GET['id'];
    $diretor = new Diretor();   
    $IsDeleted =  $diretor->delete($idDiretor);

   if ($IsDeleted) {
     header('Location: /admin/dashboard/diretores/');
   }else{
    echo "não foi possivel deletar o registro";
   }

}