<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <form method="post" action="processa_cadastrar_usuario.php" enctype="multipart/form-data">
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
                <input id="nome" name="nome" type="text" class="form-control" ng-model="nome_completo" required onchange="verificaNome()">
            </div>
            <span id="erroNome" class="alertErro hide">Nome inválido.</span>
            <div>
                <span>CPF: <span style="color:red;">*</span></span>
                <span style="position:relative;left:29%;">Telefone: <span style="color:red;">*</span></span>
                <br>
                <input id="cpf" name="cpf" type="text" class="form-control" style="width:35%;display:inline;" maxlength="11" required>
                <input id="telefone" name="telefone" type="text" class="form-control" style="width:35%;display:inline;" maxlength="11" required>
            </div>
            <?php if(isset($_GET['cpf'])){ ?>
                <span class="alertErro">
                    CPF inválido.
                </span>
            <?php } ?>
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
                <select name="nivel_acesso" id="sel1" class="form-control" style="width:30%">
                    <option value="Agente">Agente</option>
                    <option value="Coordenador">Coordenador</option>
                    <option value="Diretor">Diretor</option>
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
                <span>Senha: <span style="color:red;">*</span></span>
                <span style="position:relative;left:42%;">Confirmar Senha: <span style="color:red;">*</span></span>
                <br>
                <input name="senha_cadastro" type="password" class="form-control" style="width:50%;display:inline;" required>
                <input name="senha_cadastro_confirma" type="password" class="form-control" style="width:49%;display:inline;" required>
                <?php if(isset($_GET['senha'])){ ?>
                    <span class="alertErro">
                        Senha inválida. Senha deve possuir no mínimo 6 caracteres, 1 letra minuscula, 1 letra maiuscula e 1 número.
                    </span>
                <?php } ?>
                <?php if(isset($_GET['confirma_senha'])){ ?>
                    <span class="alertErro">
                        Senhas diferentes.
                    </span>
                <?php } ?>
            </div>  
        </div>
        <div class="box">
            Foto: <input id="foto" name="foto" type="file" accept="image/png, image/jpeg" value="Localização do Arquivo..." size="30" maxlength="30">
        </div>
        <input type="submit" class="btn btn-default btn-md" value="Cadastrar">
    </form>
</div>
</div>