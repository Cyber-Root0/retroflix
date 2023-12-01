<?php

namespace Retroflix\lib\login;
use Retroflix\interfaces\LoginInterface;
use Retroflix\models\cliente\ClienteModel;
use Retroflix\Entity\cliente\Cliente;
class Customer implements LoginInterface{

    protected string $username;
    protected string $password;
    public function __construct(){
        @session_start();
    }
    public function login(string $username, string $password){
        $this->username = $username;
        $this->password = $password;
        
        $cliente = new Cliente();
        $cliente->email = $this->username;
        $cliente->senha = hash('sha256',$this->password);
    
        $user = (new ClienteModel)->login($cliente);
       
        if (count($user) > 0) {
            $this->setLogin($user);
            $this->redirect("/filmes/");
        }else{
            $this->redirect("/cliente/?login=false");
        }

        
    }   
    public function setLogin(array $data = []){
    
        $_SESSION["customer"]["login"] = true;
        $_SESSION["customer"]["data"] = $data; 
    }
    public function logout(){

        session_destroy();
        $this->redirect();

    }

    public function isLoggedIn() : bool{
        if ( isset($_SESSION["customer"]["login"]) && $_SESSION["customer"]["login"] == true){
            return true;
        }
        return false;
    }
    public function redirect(string $url = ""){

        if (empty($url)){
            header("Location: /cliente/");
        }else{
            header("Location: $url");
        }

    }
}