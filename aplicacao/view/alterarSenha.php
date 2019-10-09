<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <form method="post" action="processa_alterar_senha.php">
        <div class="box">
            <span>Senha anterior: <span style="color:red;">*</span></span>
            <input id="senha_anterior" name="senha_anterior" type="password" class="form-control" required>
            <hr>
            <span>Nova senha: <span style="color:red;">*</span></span>
            <input id="nova_senha" name="nova_senha" type="password" class="form-control" required title="Senha deve possuir no mínimo 6 caracteres, 1 letra minuscula, 1 letra maiuscula e 1 número" onchange="verificaSenha(this.value)">
            <span id="erroSenha" class="alertErro hide">
                Senha inválida (Senha deve possuir no mínimo 6 caracteres, 1 letra minuscula, 1 letra maiuscula e 1 número).
            </span>
            <span>Confirmar Senha: <span style="color:red;">*</span></span>
            <input id="senha_confirma" name="senha_confirma" type="password" class="form-control" required onchange="verificaConfirmaSenha(this.value)">
            <span id="erroConfirmaSenha" class="alertErro hide">Senhas diferentes.</span>
        </div>
        <input type="submit" class="btn btn-default btn-md" value="Alterar">
    </form>
</div>
</div>