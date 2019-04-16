    <div class="container positioning">
    <div class="jumbotron">
        <div class="box">
            <form method="post" action="processa_cadastrar_usuario.php">
                <nav>
                    <span>Nome completo:</span>
                    <div class="form-group inline">
                        <input name="nome" type="text" class="form-control">
                    </div>
                </nav>
                <nav>
                    <span>CPF:</span>
                    <div class="form-group inline">
                        <input name="cpf" type="text" class="form-control">
                    </div>
                </nav>
                <nav>
                    <span>Telefone:</span>
                    <div class="form-group inline">
                        <input name="telefone" type="text" class="form-control">
                    </div>
                </nav>
            </div>

            <div class="box">
                <nav>
                    <span>Cargo (defesa civil):</span>
                    <div class="form-group inline">
                        <input name="cargo" type="text" class="form-control">
                    </div>
                </nav>
                <nav>
                    <span>Nível de acesso:</span>
                    <div class="form-group inline">
                        <label for="sel1"></label>
                        <select name="endereco_principal" id="sel1" class="form-control">
                            <option>Usuário 1</option>
                            <option>Usuário 2</option>
                            <option>Administrador</option>
                        </select>
                    </div>
                </nav>
            </div>

            <div class="box">
                <nav>
                    <span>Email:</span>
                    <div class="form-group inline">
                        <input name="email" type="email" class="form-control">
                    </div>
                </nav>
                <nav>
                    <span>Senha:</span>
                    <div class="form-group inline">
                        <input name="senha" type="password" class="form-control">
                    </div>
                </nav>
                <nav>
                    <span>Confirmar Senha:</span>
                    <div class="form-group inline">
                        <input name="senha_confirma" type="password" class="form-control">
                    </div>
                </nav>
            </div>

            <div class="box">
                <nav>
                    <span>Foto:</span>
                    <button class="btn btn-default btn-sm inline">Carregar foto</button>
                </nav>
            </div>
            
            <input type="submit" class="btn btn-default btn-md" value="Cadastrar">
        </form>
    </div>
    </div>