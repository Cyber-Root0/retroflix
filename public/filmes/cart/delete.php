<?php
require_once __DIR__ . "/../../../vendor/autoload.php";
require_once __DIR__ . "/../../../app/config/config.php";
use Retroflix\Entity\filme\FilmeLocacao;
use Retroflix\models\filme\Filme;
use Retroflix\lib\cart\Cart;
use Retroflix\lib\login\Customer;
$loginCustomer = new Customer();
//validações se o usuario esta logado
if (!$loginCustomer->isLoggedIn()){
    $loginCustomer->redirect();
}
$cart = new Cart();
if ( isset($_GET['codigo']) ){
    
    $result = $cart->delete(
        $_GET["codigo"]
    );
    if ($result){
        header("Location: /filmes/cart/");
    }
}