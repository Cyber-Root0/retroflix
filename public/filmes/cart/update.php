<?php
require_once __DIR__ . "/../../../vendor/autoload.php";
require_once __DIR__ . "/../../../app/config/config.php";

use Retroflix\Entity\filme\FilmeLocacao;
use Retroflix\models\filme\Filme;
use Retroflix\lib\cart\Cart;
use Retroflix\lib\login\Customer;

$loginCustomer = new Customer();
//validações se o usuario esta logado
if (!$loginCustomer->isLoggedIn()) {
  $loginCustomer->redirect();
}

$cart = new Cart();

if (isset($_GET['id']) && isset($_GET['qtyDays']) ) {
    $id = (int)$_GET['id'];
    $qtyDays = (int)$_GET['qtyDays'];
    $filme = new Filme();
    $filmeData = $filme->get($id);

    if ($filmeData) {
        $filmeLocacao = new FilmeLocacao();
        $filmeLocacao->titulo = $filmeData["titulo"];
        $filmeLocacao->codigo_filme = strval($filmeData["codigo"]);
        $filmeLocacao->numero_dias =  $qtyDays; 
        $filmeLocacao->imagem_capa = $filmeData["imagem_capa"];
        $filmeLocacao->preco_diario = $filmeData["preco_diario"];

        $cart->update($filmeLocacao);
    }
}

?>