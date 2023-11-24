<?php

require_once __DIR__ . "/../../../../vendor/autoload.php";
require_once __DIR__ . "/../../../../app/config/config.php";
use Retroflix\lib\cart\Cart;
use Retroflix\lib\login\Customer;
use Retroflix\models\fpagamento\FPagamento;
use Retroflix\models\locacao\Locacao;
use Retroflix\Entity\locacao\Locacao as EntityLocacao;
use Retroflix\models\filmeslocacao\filmeslocacao;
use Retroflix\Entity\filmeslocacao\filmesLocacao as EntityFilmeLocacao;

$cart = new Cart();
$loginCustomer = new Customer();
$ModelPayment = new FPagamento();
$clienteData = $_SESSION["customer"]["data"];
$pagamentos = (new FPagamento)->getAll();

//validações se o usuario esta logado ou n existe filme n carrinho
if (!$loginCustomer->isLoggedIn()){
    $loginCustomer->redirect();
}else if (!count($cart->getAll()) > 0) {

    header("Location: /filmes/");
}

if (isset($_POST["metodo_pagamento"])) {
    $metodo = $_POST['metodo_pagamento'];
    $locacao = new EntityLocacao();
    $locacao->codigo_cliente = $_SESSION['customer']['data']['codigo'];
    $locacao->codigo_pagamento = (int) $metodo;
    $locacao->data_locacao = new \DateTime();
    $locacao->status_atual = 1;
    $locacao->total = $cart->getTotal();

    $LocacaoModel = new Locacao();
    $result = $LocacaoModel->create($locacao);
    if ($result) {
        $idLocacao = $LocacaoModel->lastIdInsert();
        $filmelocacao = new filmeslocacao();
        $filmelocacaoEntity = new EntityFilmeLocacao();
        foreach ($cart->getAll() as $cod => $item) {

            $filmelocacaoEntity->codigo_filme = (int) $cod;
            $filmelocacaoEntity->codigo_locacao = $idLocacao;
            $filmelocacaoEntity->numero_dias = (int) $item['numero_dias'];
            $filmelocacaoEntity->preco_diario = (float) $item['preco_diario'];
            $filmelocacaoEntity->subtotal = (float) $item['subtotal'];
            $result = $filmelocacao->create($filmelocacaoEntity);
        }
        $cart->deleteAll();
        header("Location: /cliente/minha-conta/locacoes/?new_location=true");
    }
    
}else{
    header("Location: /filmes/cart/pagamento/");
}