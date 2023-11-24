
<?php
    require __DIR__."/../../../../vendor/autoload.php";
    require __DIR__."/../../../../app/config/config.php";
    use Retroflix\models\Model;
    use Retroflix\models\filme\Filme;
    use Retroflix\Entity\filme\Filme as FilmeEntity;
    use Retroflix\models\genero\Genero;
    use Retroflix\models\diretor\Diretor;
    use Retroflix\lib\login\Admin;
    if (!(new Admin)->isLoggedIn()){
        (new Admin)->redirect();
    }
    $filmeEntity = new FilmeEntity();
    $filme = new Filme();

    if ($_SERVER['REQUEST_METHOD'] == "POST" ){

        $filmeEntity->titulo = $_POST["filtro"];
    
        $filmes = $filme->find($filmeEntity);
    }
    else{
        $filmes = $filme->getAll();

    }
    $filmes = treatForegnLabels($filmes);

    function treatForegnLabels(array $filmes){

        foreach($filmes as $key => $filme){
            //substitui o codigo do diretor, pelo nome do diretor
            $filmes[$key]["codigo_diretor"] = getLabel(
                $filme["codigo_diretor"],
                Diretor::class,
                "nome"
            );
            //substitui o codigo do genero pelo nome do Genero
            $filmes[$key]["codigo_genero"] = getLabel(
                $filme["codigo_genero"],
                Genero::class,
                "nome"
            );
        }
        return $filmes;
    }

    function getLabel($cod, string $Pathclass, string $alias ){

        return (new $Pathclass())->get($cod)[$alias];
    
    }
    

?>
<!DOCTYPE html>
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

                </nav>

                <!-- Container geral -->
                <div class="container d-flex bg-white ms-0 py-4 px-4 rounded shadow-sm">
                    <form action="" method="post" class="gap-2 w-100">

                        <!-- Título -->
                        <div class="title pb-2">
                            <h3>Gerenciar</h3>
                        </div>

                        <!-- Tabelas -->
                        <div class="mt-2">
                            <div class="">
                                <div class="div d-flex justify-content-between mb-3">
                                    <div class="d-flex flex-row align-items-center">
                                        <p class="m-0 flex-fill">Filtrar por:</p>
                                        <input type="text" class="form-control w-100" name="filtro" id="">
                                    </div>
                                    <div class="div">
                                        <a href="create.php" class="btn btn-primary">Cadastrar Filmes</a>
                                    </div>
                                </div>
                                <table class="table table-hover rounded">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th scope="col">Código</th>
                                            <th scope="col">Titulo</th>
                                            <th scope="col">Lançamento</th>
                                            <th scope="col">Sinopse</th>
                                            <th scope="col">Diretor</th>
                                            <th scope="col">Genero</th>
                                            <th scope="col">Preço</th>
                                            <th scope="col">Imagem</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php foreach($filmes as $filme) { ?>
                                        <tr>
                                            <td scope="row"><?= $filme['codigo'] ?></td>
                                            <td scope="row"><?= $filme['titulo'] ?></td>
                                            <td><?= $filme['data_lancamento'] ?></td>
                                            <td><?= substr($filme['sinopse'], 0, 20) ?>...</td>
                                            <td><?= $filme['codigo_diretor'] ?></td>
                                            <td><?= $filme['codigo_genero'] ?></td>
                                            <td>R$ <?= $filme['preco_diario'] ?></td>
                                            <td>
                                                <img src="/media/capas/<?= $filme['imagem_capa'] ?>" height="100" width="100">
                                            </td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-sm ml-2" href="update.php?codigo=<?= $filme['codigo'] ?>">
                                                    <i class="fas fa-edit"></i> Alterar
                                                </a>
                                                <a type="button" class="btn btn-outline-danger btn-sm ml-2" href="delete.php?codigo=<?= $filme['codigo'] ?>"><i class="fas fa-trash-alt"></i> Excluir</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>