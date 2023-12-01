<?php

namespace Retroflix\lib\login;
use Retroflix\interfaces\LoginInterface;
use Retroflix\models\administrador\Administrador;
use Retroflix\Entity\administrador\Administrador as AdministradorEntity;
class Admin implements LoginInterface{

    protected string $username;
    protected string $password;
    protected array $user = [
        "codigo" => 0,
        "nome" => "Retroflix Admin",
        "email" => "contato@retroflix.com.br"
    ];
    public function __construct(){
        @session_start();
    }
    public function login(string $username, string $password){
        $this->username = $username;
        $this->password = $password;
        $administradorEntity = new AdministradorEntity();
        $administradorEntity->email = $this->username;
        $administradorEntity->senha = hash('sha256', $this->password);
        $user = (new Administrador)->login($administradorEntity);
       
        if (count($user) > 0) {

            $this->setLogin($user);
            $this->redirect("/admin/dashboard/");
        }else if ( $this->isSuperAdmin()){
            $this->setLogin($this->user);
            $this->redirect("/admin/dashboard/");
        }else{
            $this->redirect("/admin/?login=false");
        }

        
    }   
    public function setLogin(array $data = []){
    
        $_SESSION["admin"]["login"] = true;
        $_SESSION["admin"]["data"] = $data; 
    }
    public function isSuperAdmin(){
        if (ADMIN_LOGIN == $this->username && ADMIN_PASSWORD == $this->password){
           return true;
        }
        return false;
    }
    public function logout(){

        session_destroy();
        $this->redirect();

    }

    public function isLoggedIn() : bool{
        if ( isset($_SESSION["admin"]["login"]) && $_SESSION["admin"]["login"] == true){
            return true;
        }
        return false;
    }
    public function redirect(string $url = ""){

        if (empty($url)){
            header("Location: /admin/");
        }else{
            header("Location: $url");
        }

    }
}