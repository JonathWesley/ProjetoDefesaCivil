<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <form method="post" action="processa_cadastrar_usuario.php">
        <div class="box">
            <?php if(isset($_GET['sucesso'])){ ?>
                <div class="alert alert-success" role="alert">
                    Usuário cadastrado com sucesso.
                </div>
            <?php } ?>
            <?php if(isset($_GET['erroDB'])){ ?>
                <div class="alert alert-danger" role="alert">
                    Falha ao cadastrar usuário.
                </div>
            <?php } ?>
            <div>
                Nome completo: <span style="color:red;">*</span>
                <input name="nome" type="text" class="form-control" ng-model="nome_completo" required>
            </div>
            <?php if(isset($_GET['nome'])){ ?>
                <span class="alertErro">
                    Nome inválido.
                </span>
            <?php } ?>
            <div>
                CPF: <span style="color:red;">*</span>
                <input name="cpf" type="text" class="form-control" maxlength="11" required>
            </div>
            <?php if(isset($_GET['cpf'])){ ?>
                <span class="alertErro">
                    CPF inválido.
                </span>
            <?php } ?>
            <div>
                Telefone: <span style="color:red;">*</span>
                <input name="telefone" type="text" class="form-control" maxlength="11" required>
            </div>
            <?php if(isset($_GET['telefone'])){ ?>
                <span class="alertErro">
                    Telefone inválido.
                </span>
            <?php } ?>
        </div>

        <div class="box">
            <div class="form-group">
                Nível de acesso: <span style="color:red;">*</span>
                <label for="sel1"></label>
                <select name="nivel_acesso" id="sel1" class="form-control">
                    <option>Usuário 1</option>
                    <option>Usuário 2</option>
                    <option>Administrador</option>
                </select>
            </div>
        </div>

        <div class="box">
            <div>
                Email: <span style="color:red;">*</span>
                <input name="email_cadastro" type="email" class="form-control" required>
            </div>
            <?php if(isset($_GET['email'])){ ?>
                <span class="alertErro">
                    Email inválido.
                </span>
            <?php } ?>
            <div>
                Senha: <span style="color:red;">*</span>
                <input name="senha_cadastro" type="password" class="form-control" required>
            </div>
            <?php if(isset($_GET['senha'])){ ?>
                <span class="alertErro">
                    Senha inválida. Senha deve possuir no mínimo 6 caracteres, 1 letra minuscula, 1 letra maiuscula e 1 número.
                </span>
            <?php } ?>
            <div>
                Confirmar Senha: <span style="color:red;">*</span>
                <input name="senha_cadastro_confirma" type="password" class="form-control" required>
            </div>  
            <?php if(isset($_GET['confirma_senha'])){ ?>
                <span class="alertErro">
                    Senhas diferentes.
                </span>
            <?php } ?>
        </div>

        <div class="box">
            Foto:
            <button type="button" class="btn btn-default btn-sm">Carregar foto</button>
        </div>
        <input type="submit" class="btn btn-default btn-md" value="Cadastrar">
    </form>
</div>
</div>