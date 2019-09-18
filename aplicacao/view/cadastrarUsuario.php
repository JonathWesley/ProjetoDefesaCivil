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
                <input id="nome" name="nome" type="text" class="form-control" ng-model="nome_completo" required pattern="[a-zA-Z\s]+" title="Apenas letras e espaço">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <span>CPF: <span style="color:red;">*</span></span>
                    <input id="cpf" name="cpf" type="text" class="form-control" required onchange="verificaCpf(this.value)">    
                    <span id="erroCpf" class="alertErro hide">CPF inválido.</span>
                </div>
                <div class="col-sm-6">
                    <span>Celular: <span style="color:red;">*</span></span>
                    <input id="telefone" name="telefone" type="text" class="form-control" required pattern="\([0-9]{2}\)[\s][0-9]{4,5}-[0-9]{4}" title="(XX) XXXXX-XXXX">
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
                <input name="email_cadastro" type="email" class="form-control" required pattern="\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+" title="email@dominio.com">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <span>Senha: <span style="color:red;">*</span></span>
                    <input id="senha" name="senha_cadastro" type="password" class="form-control" required title="Senha deve possuir no mínimo 6 caracteres, 1 letra minuscula, 1 letra maiuscula e 1 número">
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
            Foto: <input id="foto" name="foto" type="file" accept="image/png,image/jpeg" value="Localização do Arquivo..." size="30" maxlength="30">
        </div>
        <input type="submit" class="btn btn-default btn-md" value="Cadastrar">
    </form>
</div>
</div>