<!DOCTYPE html>

<!-- Pendências: transformar o char do sexo em Feminino e Masculino e ajustar a aparição no update-->

<?php
    require __DIR__."/../../../../vendor/autoload.php";
    require __DIR__."/../../../../app/config/config.php";

    use Retroflix\models\cliente\ClienteModel;
    use Retroflix\Entity\cliente\Cliente as ClienteEntity;


    if (isset($_GET["codigo"])) {
        $idCliente = $_GET['codigo'];
        $clienteModel = new ClienteModel();
        $dados_cliente =  $clienteModel->get($idCliente);
        

        if (!count($dados_cliente) > 0){
            header("Location: /admin/dashboard/clientes/");
        }

    }

    if ( $_SERVER['REQUEST_METHOD'] == "POST" ){

        $clienteModel = new ClienteModel();
        $EntityCliente = new ClienteEntity();
    
        $idCliente = $_GET['codigo'];
        $nomeCliente = $_POST['nome'];
        $emailCliente = $_POST['email'];
        $cpfCliente = $_POST['cpf'];
        $telefoneCliente = $_POST['telefone'];
        $sexoCliente= $_POST['sexo'];
        $dataNascimentoCliente= new DateTime($_POST["dtNascimento"]);
        $senhaCliente = $_POST['senha'];
    
        $EntityCliente ->codigo = $idCliente;
        $EntityCliente->nome = $nomeCliente;
        $EntityCliente->email = $emailCliente;
        $EntityCliente->senha = $senhaCliente;
        $EntityCliente->cpf = $cpfCliente;
        $EntityCliente->telefone = $telefoneCliente;
        $EntityCliente->sexo = $sexoCliente;
        $EntityCliente->dataNascimento = $dataNascimentoCliente;
        
        $result = $clienteModel->update($EntityCliente);
        if ($result) {
            header('Location: /admin/dashboard/clientes/');
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
                <h2>Clientes</h2>

                <!-- Breadcrumb -->
                <nav class="mt-4 mb-2" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Clientes</a></li>
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
                                    <input type="text" name="nome" id="nome" value="<?= $dados_cliente['nome'] ?>" required class="form-control">
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" id="email" value="<?= $dados_cliente['email'] ?>" required class="form-control">
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" id="cpf" required value="<?= $dados_cliente['cpf'] ?>" class="form-control">
                                </div>
                            </div>

                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group col-md-3 flex-fill">
                                    <label for="telefone" class="" >Telefone</label>
                                    <input type="text" name="telefone" id="telefone" value="<?= $dados_cliente['telefone'] ?>" required class="form-control">
                                </div>
                                
                                <div class="form-group col-md-3 flex-fill">
                                    <label for="telefone" class="" >Sexo</label>
                                    <select name="sexo" id="sexo" required value="<?= $dados_cliente['nome'] ?>" class="form-select">
                                        <option value="f">Feminino</option>
                                        <option value="m">Masculino</option>
                                        <option value="o">Prefiro não informar</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="dtNascimento" >Data de nascimento</label>
                                    <input type="date" name="dtNascimento" required id="dtNascimento" value="<?= $dados_cliente['data_nascimento'] ?>" class="form-control">
                                </div>
                            </div>

                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group">
                                    <label for="senha">Senha</label>
                                    <input type="text" name="senha" required id="senha" value="<?= $dados_cliente['senha'] ?>" class="form-control">
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