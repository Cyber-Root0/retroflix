<!DOCTYPE html>

<!-- Pendências: transformar o char do sexo em Feminino e Masculino e ajustar a aparição no update-->

<?php
    require __DIR__."/../../../../vendor/autoload.php";
    require __DIR__."/../../../../app/config/config.php";
    use Retroflix\models\locacao\Locacao;
    use Retroflix\Entity\locacao\Locacao as LocacaoEntity;
    use Retroflix\lib\login\Admin;
    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }
    $locacaoModel = new Locacao();
    if (isset($_GET["id"])) {
        $idLocacao =(int) $_GET['id'];
        $dados_locacao = $locacaoModel->get($idLocacao);
        if (!count($dados_locacao) > 0){
            header("Location: /admin/dashboard/locacoes/");
        }

    }

    if ( $_SERVER['REQUEST_METHOD'] == "POST" ){

        $locacaoEntity = new LocacaoEntity();
        $locacaoEntity->codigo = (int) $_POST['codigo'];
        $locacaoEntity->status_atual = (int) $_POST['status'];

        $result = $locacaoModel->update($locacaoEntity);
        if ($result) {
            header('Location: /admin/dashboard/locacoes/');
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
                <h2>Locações</h2>

                <!-- Breadcrumb -->
                <nav class="mt-4 mb-2" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Locações</a></li>
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
                                    <label for="codigo" class="" >Código</label>
                                    <input type="text" readonly name="codigo" id="nome" value="<?= $dados_locacao['codigo_locacao'] ?>" required class="form-control">
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="data">Data</label>
                                    <input type="date" readonly name="email" id="email" value="<?= $dados_locacao['data_locacao'] ?>" required class="form-control">
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="cpf">TOTAL</label>
                                    <input type="text" readonly name="total" id="cpf" required value="R$ <?= $dados_locacao['total'] ?>" class="form-control">
                                </div>
                            </div>

                            <!-- Linha formulário -->
                            <div class="row">
                                 <div class="form-group col-md-3 flex-fill">
                                    <label for="Status" class="" >Status</label>
                                    <select name="status" id="status" required value="<?= $dados_locacao['status_atual'] ?>" class="form-select">
                                        <option value="0">Pendente</option>
                                        <option value="1">Pago</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="nome_cliente" >Cliente</label>
                                    <input type="text" readonly name="nome_cliente" required id="nome_cliente" value="<?= $dados_locacao['nome_cliente'] ?>" class="form-control">
                                </div>
                            </div>

                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group">
                                    <label for="senha">Forma de Pagamento</label>
                                    <input type="text" readonly name="senha" required id="senha" value="<?= $dados_locacao['forma_pagamento'] ?>" class="form-control">
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