<?php

require __DIR__."/../../vendor/autoload.php";
require __DIR__."/../../app/config/config.php";
use Retroflix\lib\login\Customer;
$msg = false;
if (isset($_POST["login"])) {

  $username = $_POST["email"];
  $password = $_POST["password"];
    var_dump($_POST);
   (new Customer())->login($username, $password);


}
if (isset($_GET['login'])){
  $msg = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Retroflix</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Basic.css">
    <style>
    section{
        display: flex;
    background: url("../assets/img/background_retroflix.jpg") top / cover no-repeat;
    height: 100vh;
    align-items: center;
    justify-content: center;
    }
    </style>
</head>

<body style="background: #14181c;box-shadow: 0px 0px 16px 13px rgb(0,0,0);">
    <section class="position-relative py-4 py-xl-5" style="background: url(&quot;../assets/img/background_retroflix.jpg&quot;) top / cover no-repeat;">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4" style="background: #14181c;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                </svg></div>
                            <form class="text-center" method="post" action="">
                                <div class="mb-3"><input class="form-control" type="text" name="email" placeholder="Email"></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Senha" value="qsqs"></div>
                                <div class="mb-3"><input class="btn btn-primary d-block w-100" type="submit" style="background: #14181c;color: #ffffff;" name="login" value="Login"></div>
                                
                            </form>
                            <a href="/admin/"> <p class="text-muted" style="font-size: 12px">Administrador</p> </a>
                            <a href="/cliente/cadastro/" style="margin-top: -30px;"> <p class="text-muted" style="font-size: 12px">Cadastre-se</p> </a>
                            <a href="/" style="margin-top: -30px;"> <p class="text-muted" style="font-size: 12px">Home</p> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>

  function loginError(){
    Swal.fire({
    icon: "error",
    title: "Login Inválido",
    text: "Tente novamente!"
    });
  }
  <?php
    if ($msg) {
        echo "loginError();";
    }
    ?>
</script>
</body>

</html>