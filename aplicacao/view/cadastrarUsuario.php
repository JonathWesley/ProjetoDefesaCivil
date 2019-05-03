    <div class="container positioning">
    <div class="jumbotron">
    <form method="post" action="processa_cadastrar_usuario.php">
        <div class="box">
                <?php 
                    if(isset($_GET['sucesso'])){
                ?>
                <div class="alert alert-success" role="alert">
                    Ocorrencia cadastrada com sucesso.
                </div>
                <?php 
                    }
                ?>
                <?php 
                    if(isset($_GET['erroDB'])){
                ?>
                <div class="alert alert-danger" role="alert">
                    Falha ao cadastrar ocorrencia. <br>
                    <?php echo $_GET['erroDB']; ?>
                </div>
                <?php 
                    }
                ?>
                <nav>
                    Nome completo:
                    <div class="form-group">
                        <input name="nome" type="text" class="form-control" ng-model="nome_completo" required>
                    </div>
                </nav>
                <?php 
                    if(isset($_GET['nome'])){
                ?>
                    <div class="alert alert-danger" role="alert">
                        Nome inválido.
                    </div>
                <?php 
                    }
                ?>
                <nav>
                    CPF:
                    <div class="form-group">
                        <input name="cpf" type="text" class="form-control" maxlength="11" required>
                    </div>
                </nav>
                <?php 
                    if(isset($_GET['cpf'])){
                ?>
                    <div class="alert alert-danger" role="alert">
                        CPF inválido.
                    </div>
                <?php 
                    }
                ?>
                <nav>
                    Telefone:
                    <div class="form-group">
                        <input name="telefone" type="text" class="form-control" maxlength="11" required>
                    </div>
                </nav>
                <?php 
                    if(isset($_GET['telefone'])){
                ?>
                    <div class="alert alert-danger" role="alert">
                        Telefone inválido.
                    </div>
                <?php 
                    }
                ?>
            </div>

            <div class="box">
                <nav>
                    <div class="form-group">
                        Nível de acesso:
                        <label for="sel1"></label>
                        <select name="nivel_acesso" id="sel1" class="form-control">
                            <option>Usuário 1</option>
                            <option>Usuário 2</option>
                            <option>Administrador</option>
                        </select>
                    </div>
                </nav>
            </div>

            <div class="box">
                <nav>
                    Email:
                    <div class="form-group">
                        <input name="email_cadastro" type="email" class="form-control" required>
                    </div>
                </nav>
                <?php 
                    if(isset($_GET['email'])){
                ?>
                    <div class="alert alert-danger" role="alert">
                        Email inválido.
                    </div>
                <?php 
                    }
                ?>
                <nav>
                    Senha:
                    <div class="form-group">
                        <input name="senha_cadastro" type="password" class="form-control" required>
                    </div>
                </nav>
                <?php 
                    if(isset($_GET['senha'])){
                ?>
                    <div class="alert alert-danger" role="alert">
                        Senha inválida. Senha deve possuir no mínimo 6 caracteres, 1 letra minuscula, 1 letra maiuscula e 1 número.
                    </div>
                <?php 
                    }
                ?>
                <nav>
                    Confirmar Senha:
                    <div class="form-group">
                        <input name="senha_cadastro_confirma" type="password" class="form-control" required>
                    </div>
                </nav>
                <?php 
                    if(isset($_GET['confirma_senha'])){
                ?>
                    <div class="alert alert-danger" role="alert">
                        Senhas diferentes.
                    </div>
                <?php 
                    }
                ?>
            </div>

            <div class="box">
                <nav>
                    Foto:
                    <button type="button" class="btn btn-default btn-sm">Carregar foto</button>
                </nav>
            </div>
            <input type="submit" class="btn btn-default btn-md" value="Cadastrar">
        </form>
    </div>
    </div>