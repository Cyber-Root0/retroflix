<?php
require_once __DIR__ . "/../../../../vendor/autoload.php";
require_once __DIR__ . "/../../../../app/config/config.php";
use Retroflix\lib\cart\Cart;
use Retroflix\lib\login\Customer;
use Retroflix\models\fpagamento\FPagamento;

$cart = new Cart();
$loginCustomer = new Customer();
$ModelPayment = new FPagamento();
$clienteData = $_SESSION["customer"]["data"];
$pagamentos = (new FPagamento)->getAll();
//validações se o usuario esta logadom ou n existe filme n carrinho
if (!$loginCustomer->isLoggedIn()){
    $loginCustomer->redirect();
}else if (!count($cart->getAll()) > 0) {

    header("Location: /filmes/");
}

//variaveis essenciais no sistema
$filmesCart = $cart->getAll();

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <title>Checkout | Retroflix</title>
  </head>
  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h2>Finalizar Cotação</h2>
      </div>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Seu Carrinho</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <?php foreach($filmesCart as $filme): ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"> <?= $filme['titulo'] ?> </h6>
                <small class="text-muted">Qtd Dias: <?= $filme['numero_dias']?></small><br>
                <small class="text-muted">Preço Diário: R$ <?= $filme['preco_diario']?></small>
              </div>
              <span class="text-muted">R$<?= $filme['subtotal'] ?></span>
            </li>
            <?php endforeach; ?>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (BRL)</span>
              <strong>R$ <?= $cart->getTotal() ?></strong>
            </li>
          </ul>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Endereço</h4>
          <form class="needs-validation" novalidate action="processa.php" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nome</label>
                <input type="text" value="<?= $clienteData['nome'] ?>" class="form-control" id="firstName" readonly placeholder="" value="" required>
                <div class="invalid-feedback">
                  
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted"></span></label>
              <input type="email" value="<?= $clienteData['email'] ?>" readonly class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
              </div>
            </div>

            <div class="mb-3">
              <label for="address">CPF</label>
              <input type="number" value="<?= $clienteData['cpf']?>" class="form-control" id="" placeholder="" readonly required>
              <div class="invalid-feedback">
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Telefone</label>
              <input type="number" value="<?= $clienteData['telefone']?>" class="form-control" id="" placeholder="" readonly required>
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="mb-3">
              <label for="address">Dt. Nascimento</label>
              <input type="date" value="<?= $clienteData['data_nascimento']?>" class="form-control" id="" placeholder="" readonly required>
              <div class="invalid-feedback">
              </div>
            </div>
            <h4 class="mb-3">Método de Pagamento</h4>
            <div class="d-block my-3">
              <div class="custom-control custom-radio"> 
              <select name="metodo_pagamento" id="payment"> 
              <?php foreach($pagamentos as $key => $payment): ?>
                    <option value="<?= $payment['codigo'] ?>"><?= $payment['descricao'] ?></option> 
               <?php endforeach; ?>
               </select>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Finalizar</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2023 - Retroflix</p>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     </body>
</html>
