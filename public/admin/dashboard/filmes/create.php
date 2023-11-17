<!DOCTYPE html>

<?php
    require __DIR__."/../../../../vendor/autoload.php";
    require __DIR__."/../../../../app/config/config.php";

    use Retroflix\models\diretor\Diretor;
    use Retroflix\models\genero\Genero;
    use Retroflix\models\filme\Filme;
    use Retroflix\Entity\filme\Filme as FilmeEntity;
    use Retroflix\lib\login\Admin;
    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }
    $filme = new Filme();
    $filmeEntity = new FilmeEntity();

   
    if(isset($_POST["cadastrar"])) {

        $pathImg = __DIR__."/../../../media/capas";

        $titulo = $_POST["titulo"];
        $dtlancamento = $_POST['dtlancamento'];
        $sinopse = $_POST['sinopse'];
        $cod_diretor = $_POST['diretor'];
        $cod_genero = $_POST['genero'];
        $link = $_POST['link'];
        $preco_diario = $_POST['preco_diario'];

        $filmeEntity->codigo_diretor = $cod_diretor;
        $filmeEntity->codigo_genero = $cod_genero;
        $filmeEntity->data_lancamento = new \DateTime($dtlancamento);
        $filmeEntity->imagem_capa = treetImgUploaded($pathImg);
        $filmeEntity->link = $link;
        $filmeEntity->preco_diario = $preco_diario;
        $filmeEntity->sinopse = $sinopse;
        $filmeEntity->titulo = $titulo;
        $result = $filme->create($filmeEntity);
        if ($result){
            header("Location: /admin/dashboard/filmes/");
        }

    }

    $generos = (new Genero)->getAll();
    $diretores = (new Diretor)->getAll();


    function treetImgUploaded($pathImg){
        
        if (isset($_FILES["imagem_capa"])){
            $img_name = hash_file("sha256",$_FILES["imagem_capa"]["tmp_name"]);
            $file = basename($_FILES["imagem_capa"]["name"]);
            $ext = strtolower(pathinfo($file,PATHINFO_EXTENSION));
            $path = $pathImg."/{$img_name}.{$ext}";
            move_uploaded_file($_FILES["imagem_capa"]["tmp_name"], $path);
            return $img_name.".".$ext;
        }
        return '';

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
                <h2>Filmes</h2>

                <!-- Breadcrumb -->
                <nav class="mt-4 mb-2" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Filmes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
                    </ol>
                </nav>

                <!-- Container geral -->
                <div class="container d-flex bg-white ms-0 py-4 px-4 rounded shadow-sm">
                    <form action="" method="post" class="gap-2 w-100" enctype="multipart/form-data">

                        <!-- Título -->
                        <div class="title pb-2">
                            <h3>Cadastrar</h3>
                        </div>

                        <!-- Container formulário -->
                        <div class="d-grid gap-3 d-fill">
                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group col-md-3 flex-fill">
                                    <label for="titulo" class="" >Titulo</label>
                                    <input type="text" name="titulo" id="titulo" required class="form-control">
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="dtNascimento" >Data de Lançamento</label>
                                    <input type="date" name="dtlancamento" required id="dtlancamento" class="form-control">
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="imagem_capa">Imagem da Capa</label>
                                    <input type="file" name="imagem_capa" id="imagem_capa" required class="form-control">
                                </div>
                            </div>

                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group col-md-3 flex-fill">
                                    <label for="sinopse" class="" >Sinopse</label>
                                    <textarea class="form-control" id="sinopse" name="sinopse" rows="3"></textarea>
                                </div>
                                
                            </div>

                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group col-md-3 flex-fill">
                                    <label for="diretor" class="" >Diretor</label>
                                    <select name="diretor" id="diretor" required class="form-select">
                                        <?php foreach($diretores as $diretor): ?>
                                        <option value="<?= $diretor['codigo'] ?>"> <?= $diretor['nome'] ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-3 flex-fill">
                                    <label for="genero" class="" >Genero</label>
                                    <select name="genero" id="genero" required class="form-select">
                                         <?php foreach($generos as $genero): ?>
                                            <option value="<?= $genero['codigo'] ?>"> <?= $genero['nome'] ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="link">Link do Filme</label>
                                    <input type="url" name="link" required id="link" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="senha">Preço Diário</label>
                                    <input type="number" required name="preco_diario" required id="senha" class="form-control">
                                </div>
                            </div>

                            <!-- Botão Formulário -->
                            <div class="d-flex justify-content-end pt-3">
                                <div class="col-md-2 ">
                                    <input type="submit" name="cadastrar" class="w-100 btn  btn-primary" value="Cadastrar Filme">
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