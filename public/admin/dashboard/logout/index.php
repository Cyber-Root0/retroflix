<?php
 require_once __DIR__."/../../../../vendor/autoload.php";
 require_once __DIR__."/../../../../app/config/config.php";
use Retroflix\lib\login\Admin;
    //verifica se esta logado como admin, e redireciona p/ painel de login
    if ((new Admin)->isLoggedIn()){
        (new Admin)->logout();
    }else{
        //se não estiver logado como admin, redireciona p/ home
        (new Admin)->redirect("/");
    }

?>