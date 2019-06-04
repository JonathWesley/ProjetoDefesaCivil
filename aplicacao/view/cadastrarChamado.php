<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <form method="post" action="processa_cadastrar_chamado.php">
        <?php if(isset($_GET['sucesso'])){ ?>
            <div class="alert alert-success" role="alert">
                Ocorrencia cadastrada com sucesso.
            </div>
            <?php } ?>
            <?php if(isset($_GET['erroDB'])){ ?>
            <div class="alert alert-danger" role="alert">
                Falha ao cadastrar ocorrencia.
            </div>
        <?php } ?>
        <div class="box">
            <div>
                Data: <span style="color:red;">*</span>
                <input id="data_chamado" name="data_chamado" type="date" class="form-control" required>
            </div>
            <div>
                Horário: <span style="color:red;">*</span>
                <input type="time" name="horario_chamado" class="form-control" required>
            </div>
            <div>
                Origem: <span style="color:red;">*</span>
                <input type="text" name="origem_chamado" class="form-control" required>
            </div>
            <div>
                Pessoa atendida: <span style="color:red;">*</span>
                <br>
                <input type="text" id="nome_chamado" name="nome_chamado" class="form-control inline" required>
                <button type="button" class="btn-default btn-small inline" data-toggle="modal" data-target="#pessoasModal"><span class="glyphicon glyphicon-plus"></span></button>
            </div>
        </div>
        <div class="box">
            <div>
                Endereço principal: <span style="color:red;">*</span>
                <label for="endereco_principal"></label>
                <select name="endereco_principal" class="form-control" ng-model="sel_endereco" ng-init="sel_endereco='Coordenada'" required>
                    <option value="Coordenada">Coordenada</option>
                    <option value="Logradouro">Logradouro</option>
                </select>
            </div>
            <div ng-show="sel_endereco == 'Coordenada'">
                <div>
                    Longitude: <span style="color:red;">*</span>
                    <input name="longitude" type="text" class="form-control">
                </div>
                <div>
                    Latitude: <span style="color:red;">*</span>
                    <input name="latitude" type="text" class="form-control">
                </div>
            </div>
            <div ng-show="sel_endereco == 'Logradouro'">
                <div>
                    CEP:
                    <input id="cep" name="cep" type="text" class="form-control" ng-model="cep">
                </div>
                <div>
                    Logradouro: <span style="color:red;">*</span>
                    <input id="logradouro" name="logradouro" type="text" class="form-control">
                </div>
                <div>
                    Número: <span style="color:red;">*</span>
                    <input id="complemento" name="complemento" type="text" class="form-control">
                </div>
                <div>
                    Bairro:
                    <input id="bairro" name="bairro" type="text" class="form-control">
                </div>
                <div>
                    Cidade:
                    <input id="cidade" name="cidade" type="text" class="form-control">
                </div>
                <div>
                    Referência:
                    <input name="referencia" type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="box">
            <div>
                Descrição: <span style="color:red;">*</span>
                <textarea id="descricao" name="descricao" class="form-control" cols="30" rows="2" maxlength = "100" ng-model="descricaoVal" required></textarea>
                <span class="char-count">{{descricaoVal.length || 0}}/100</span>
            </div>
        </div>
        <input type="submit" class="btn btn-default btn-md" value="Cadastrar">
    </form>
    <div class="modal fade" id="pessoasModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Cadastrar pessoa</h5>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <nav>
                            <div class="form-group">
                                Nome:
                                <input id="nome_pessoa" name="nome_pessoa" type="text" class="form-control">
                            </div>   
                            <div class="form-group">
                                CPF:
                                <input id="cpf_pessoa" name="cpf_pessoa" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                Outros documentos:
                                <input id="outros_documentos" name="outros_documentos" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                Telefone: 
                                <input id="telefone_pessoa" name="telefone_pessoa" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                Email:
                                <input id="email_pessoa" name="email_pessoa" type="email" class="form-control">
                            </div>
                        </nav>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="submitFormData" onclick="SubmitFormData()" data-dismiss="modal">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        //POST pessoa
        var input = document.getElementById("submitFormData");
        // Execute a function when the user releases a key on the keyboard
        input.addEventListener("keydown", function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("submitFormData").click();
        }
        });
        function SubmitFormData() {
            var nome_pessoa = $("#nome_pessoa").val();
            var email_pessoa = $("#email_pessoa").val();
            var telefone_pessoa = $("#telefone_pessoa").val();
            var cpf_pessoa = $("#cpf_pessoa").val();
            var outros_documentos = $("#outros_documentos").val();

            document.getElementById("nome_chamado").value = nome_pessoa;
            
            $.post("processa_cadastrar_pessoa.php", { nome_pessoa: nome_pessoa, email_pessoa: email_pessoa,
                telefone_pessoa: telefone_pessoa, cpf_pessoa: cpf_pessoa, outros_documentos:outros_documentos, nome_salvar: nome_pessoa });
        }
    </script>
</div>
</div>
