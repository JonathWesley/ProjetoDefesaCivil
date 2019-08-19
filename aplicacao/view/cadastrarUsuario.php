<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <form method="post" action="processa_cadastrar_usuario.php" enctype="multipart/form-data" onsubmit="return validarFormCadastroUsuario()">
        <div class="box">
            <h3 class="text-center" style="margin:5px;">Cadastro de usuário</h3>
        <hr>
            <?php if(isset($_GET['sucesso'])){ ?>
                <div class="alert alert-success" role="alert">Usuário cadastrado com sucesso.</div>
            <?php } ?>
            <?php if(isset($_GET['erroDB'])){ ?>
                <div class="alert alert-danger" role="alert">Falha ao cadastrar usuário.</div>
            <?php } ?>
            <div>
                Nome completo: <span style="color:red;">*</span>
                <input id="nome" name="nome" type="text" class="form-control" ng-model="nome_completo" required onchange="verificaNome(this.value)">
            </div>
            <span id="erroNome" class="alertErro hide">Nome inválido.</span>
            <div class="row">
                <div class="col-sm-6">
                    <span>CPF: <span style="color:red;">*</span></span>
                    <input id="cpf" name="cpf" type="text" class="form-control" maxlength="11" required onchange="verificaCpf(this.value)">    
                    <span id="erroCpf" class="alertErro hide">CPF inválido.</span>
                </div>
                <div class="col-sm-6">
                    <span>Telefone: <span style="color:red;">*</span></span>
                    <input id="telefone" name="telefone" type="text" class="form-control" maxlength="11" required onchange="verificaTelefone(this.value)">
                    <span id="erroTelefone" class="alertErro hide">Telefone inválido.</span>
                </div>
            </div>
        <hr>
            <div class="form-group">
                Nível de acesso: <span style="color:red;">*</span>
                <label for="sel1"></label>
                <select name="nivel_acesso" id="sel1" class="form-control cobrade-sub">
                    <option value="Agente">Agente</option>
                    <option value="Coordenador">Coordenador</option>
                    <option value="Diretor">Diretor</option>
                </select>
            </div>
        <hr>
            <div>
                Email: <span style="color:red;">*</span>
                <input name="email_cadastro" type="email" class="form-control" required onchange="verificaEmail(this.value)">
            </div>
            <span id="erroEmail" class="alertErro hide">Email inválido.</span>
            <div class="row">
                <div class="col-sm-6">
                    <span>Senha: <span style="color:red;">*</span></span>
                    <input id="senha" name="senha_cadastro" type="password" class="form-control" required onchange="verificaSenha(this.value)">
                    <span id="erroSenha" class="alertErro hide">
                        Senha inválida (Senha deve possuir no mínimo 6 caracteres, 1 letra minuscula, 1 letra maiuscula e 1 número).
                    </span>
                </div>
                <div class="col-sm-6">
                    <span>Confirmar Senha: <span style="color:red;">*</span></span>
                    <input id="senha_confirma" name="senha_cadastro_confirma" type="password" class="form-control" required onchange="verificaConfirmaSenha(this.value)">
                    <span id="erroConfirmaSenha" class="alertErro hide">Senhas diferentes.</span>
                </div>
            </div>  
        <hr>
            Foto: <input id="foto" name="foto" type="file" accept="image/png, image/jpeg" value="Localização do Arquivo..." size="30" maxlength="30">
        </div>
        <input type="submit" class="btn btn-default btn-md" value="Cadastrar">
    </form>
</div>
</div>