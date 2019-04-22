    <div class="container positioning">
    <div class="jumbotron">
    <form method="post" action="processa_cadastrar_usuario.php">
        <div class="box">
            
                <nav>
                    Nome completo:
                    <div class="form-group">
                        <input name="nome" type="text" class="form-control">
                    </div>
                </nav>
                <nav>
                    CPF:
                    <div class="form-group">
                        <input name="cpf" type="text" class="form-control">
                    </div>
                </nav>
                <nav>
                    Telefone:
                    <div class="form-group">
                        <input name="telefone" type="text" class="form-control">
                    </div>
                </nav>
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
                        <input name="email_cadastro" type="email" class="form-control">
                    </div>
                </nav>
                <nav>
                    Senha:
                    <div class="form-group">
                        <input name="senha_cadastro" type="password" class="form-control">
                    </div>
                </nav>
                <nav>
                    Confirmar Senha:
                    <div class="form-group">
                        <input name="senha_cadastro_confirma" type="password" class="form-control">
                    </div>
                </nav>
            </div>

            <div class="box">
                <nav>
                    Foto:
                    <button type="btn" class="btn btn-default btn-sm">Carregar foto</button>
                </nav>
            </div>
            
            <input type="submit" class="btn btn-default btn-md" value="Cadastrar">
        </form>
    </div>
    </div>