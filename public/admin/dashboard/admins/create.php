<!DOCTYPE html>

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
                            <h3>Cadastrar</h3>
                        </div>

                        <!-- Container formulário -->
                        <div class="d-grid gap-3 d-fill">
                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group col-md-3 flex-fill">
                                    <label for="nome" class="" >Nome</label>
                                    <input type="text" name="nome" id="nome" class="form-control">
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" id="cpf" class="form-control">
                                </div>
                            </div>

                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group col-md-3 flex-fill">
                                    <label for="telefone" class="" >Telefone</label>
                                    <input type="text" name="telefone" id="telefone" class="form-control">
                                </div>
                                
                                <div class="form-group col-md-3 flex-fill">
                                    <label for="telefone" class="" >Sexo</label>
                                    <select name="sexo" id="sexo" class="form-select">
                                        <option value="f">Feminino</option>
                                        <option value="m">Masculino</option>
                                        <option value="o">Prefiro não informar</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="dtNascimento">Data de nascimento</label>
                                    <input type="date" name="dtNascimento" id="dtNascimento" class="form-control">
                                </div>
                            </div>

                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group">
                                    <label for="senha">Senha</label>
                                    <input type="text" name="senha" id="senha" class="form-control">
                                </div>
                            </div>

                            <!-- Botão Formulário -->
                            <div class="d-flex justify-content-end pt-3">
                                <div class="col-md-2 ">
                                    <input type="submit" class="w-100 btn  btn-primary" value="Cadastrar administrador">
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