<!DOCTYPE html>

<!-- Pendências: transformar o char do sexo em Feminino e Masculino e ajustar a aparição no update-->

<?php
    require __DIR__."/../../../../vendor/autoload.php";
    require __DIR__."/../../../../app/config/config.php";

    use Retroflix\models\administrador\Administrador;
    use Retroflix\Entity\administrador\Administrador as AdministradorEntity;


    if (isset($_GET["codigo"])) {
        $idAdministrador = $_GET['codigo'];
        $administrador = new Administrador();
        $dados_administrador =  $administrador->get($idAdministrador);
        

        if (!count($dados_administrador) > 0){
            header("Location: /admin/dashboard/admins/");
        }

    }

    if ( $_SERVER['REQUEST_METHOD'] == "POST" ){

        $administrador = new Administrador();
        $EntityAdministrador = new AdministradorEntity();
    
        $idAdministrador = $_GET['codigo'];
        $nomeAdministrador = $_POST['nome'];
        $emailAdministrador = $_POST['email'];
        $cpfAdministrador = $_POST['cpf'];
        $telefoneAdministrador = $_POST['telefone'];
        $sexoAdministrador = $_POST['sexo'];
        $dataNascimentoAdministrador = new DateTime($_POST["dtNascimento"]);
        $senhaAdministrador = $_POST['senha'];
    
        $EntityAdministrador->codigo = $idAdministrador;
        $EntityAdministrador->nome = $nomeAdministrador;
        $EntityAdministrador->email = $emailAdministrador;
        $EntityAdministrador->cpf = $cpfAdministrador;
        $EntityAdministrador->telefone = $telefoneAdministrador;
        $EntityAdministrador->sexo = $sexoAdministrador;
        $EntityAdministrador->data_nascimento = $dataNascimentoAdministrador;
        $EntityAdministrador->senha = $senhaAdministrador;
        
        $result = $administrador->update($EntityAdministrador);
        if ($result) {
            header('Location: /admin/dashboard/admins/');
        }else{
            echo "não foi possivel atualizar o registro";
        }
    
    }

?>

<body>
    <!-- Body -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Chamando a Side-Bar do sistema -->
            <?php require("..\componentes\side-bar.php"); ?>

            <!-- Conteúdo do site -->
            <div class="col-auto col-md-9 ms-5 mt-4 bg-light py-3">
                <h2>Administradores</h2>

                <!-- Breadcrumb -->
                <nav class="mt-4 mb-2" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Administradores</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
                    </ol>
                </nav>

                <!-- Container geral -->
                <div class="container d-flex bg-white ms-0 py-4 px-4 rounded shadow-sm">
                    <form action="" method="post" class="gap-2 w-100">

                        <!-- Título -->
                        <div class="title pb-2">
                            <h3>Alterar</h3>
                        </div>

                        <!-- Container formulário -->
                        <div class="d-grid gap-3 d-fill">
                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group col-md-3 flex-fill">
                                    <label for="nome" class="" >Nome</label>
                                    <input type="text" name="nome" id="nome" value="<?= $dados_administrador['nome'] ?>" required class="form-control">
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" id="email" value="<?= $dados_administrador['email'] ?>" required class="form-control">
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" id="cpf" required value="<?= $dados_administrador['cpf'] ?>" class="form-control">
                                </div>
                            </div>

                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group col-md-3 flex-fill">
                                    <label for="telefone" class="" >Telefone</label>
                                    <input type="text" name="telefone" id="telefone" value="<?= $dados_administrador['telefone'] ?>" required class="form-control">
                                </div>
                                
                                <div class="form-group col-md-3 flex-fill">
                                    <label for="telefone" class="" >Sexo</label>
                                    <select name="sexo" id="sexo" required value="<?= $dados_administrador['nome'] ?>" class="form-select">
                                        <option <?php if($dados_administrador['sexo'] == "f") { echo "selected"; } ?> value="f">Feminino</option>
                                        <option value="m" <?php if($dados_administrador['sexo'] == "m") { echo "selected"; } ?>>Masculino</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="dtNascimento" >Data de nascimento</label>
                                    <input type="date" name="dtNascimento" required id="dtNascimento" value="<?= $dados_administrador['data_nascimento'] ?>" class="form-control">
                                </div>
                            </div>

                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group">
                                    <label for="senha">Senha</label>
                                    <input type="text" name="senha" required id="senha" value="<?= $dados_administrador['senha'] ?>" class="form-control">
                                </div>
                            </div>

                            <!-- Botão Formulário -->
                            <div class="d-flex justify-content-end pt-3">
                                <div class="col-md-2">
                                    <input type="submit" name="cadastrar" class="w-100 btn  btn-primary" value="Alterar dados">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>