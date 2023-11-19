<?php

require __DIR__."/../../vendor/autoload.php";
require __DIR__."/../../app/config/config.php";
use Retroflix\lib\login\Admin;

if (isset($_POST["login"])) {

  $username = $_POST["email"];
  $password = $_POST["password"];
   (new Admin())->login($username, $password);


}
if (isset($_GET['login'])){
  $msg = true;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Retroflix</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<div class="d-flex flex-row justify-content-center align-items-center" style="height: 100vh">
        
<form class="col-4" method="POST" action="">
  <!-- Email input -->
  <div class="form-outline mb-">
    <label class="form-label" for="form2Example1">Email</label>
    <input type="text" id="form2Example1" class="form-control" name="email" />
    <label class="form-label" for="form2Example1">Email</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Senha</label>
    <input type="password" id="form2Example2" class="form-control" name="password" />
  </div>

  <!-- Submit button -->
  <input type="submit" name="login" class="btn btn-primary btn-block mb-4" value="Fazer Login">

</form>

</div>
<script>

  function loginError(){
    Swal.fire({
    icon: "error",
    title: "Login Inválido",
    text: "Tente novamente!"
    });
  }

</script>
<?php
  if ($msg){
    echo "<script>loginError();</script>";
  }
?>
</body>