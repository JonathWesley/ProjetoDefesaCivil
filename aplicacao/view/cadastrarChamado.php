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
                <span>Data: <span style="color:red;">*</span></span>
                <span style="position:relative;left:23%">Horário: <span style="color:red;">*</span></span> 
                <br>
                <input id="data_chamado" name="data_chamado" type="date" class="form-control" style="width:30%;display:inline;" max="<?php echo date('Y-m-d'); ?>" required>
                <input type="time" name="horario_chamado" class="form-control" style="width:30%;display:inline;" required>
            </div>
            <div>
                Origem: <span style="color:red;">*</span>
                <input type="text" name="origem_chamado" class="form-control" required>
            </div>
            <div>
                Pessoa atendida: <span style="color:red;">*</span>
                <br>
                <input type="text" id="pessoa_nome" name="nome_chamado" class="form-control inline" style="width:93%;" onkeyup="showResult(this.value,this.id)" required>
                <button type="button" class="btn-default btn-small inline open-AddBookDialog" data-toggle="modal" data-id="pessoa_nome"><span class="glyphicon glyphicon-plus"></span></button>
                <div class="autocomplete" id="livesearchpessoa_nome"></div>
                <div id="resultpessoa_nome"></div>
            </div>
        </div>
        <div class="box">
            <div>
                Endereço principal: <span style="color:red;">*</span>
                <br>
                <label for="endereco_principal"></label>
                <select name="endereco_principal" class="form-control" style="width:30%;display:inline;" ng-model="sel_endereco" ng-init="sel_endereco='Coordenada'" required>
                    <option value="Coordenada">Coordenada</option>
                    <option value="Logradouro">Logradouro</option>
                </select>
            </div>
            <div ng-show="sel_endereco == 'Coordenada'">
                <div>
                    <span>Longitude: <span style="color:red;">*</span></span> 
                    <span style="position:relative;left:19%;">Latitude: <span style="color:red;">*</span></span>
                    <br>
                    <input name="longitude" type="text" class="form-control" style="width:30%;display:inline;">
                    <input name="latitude" type="text" class="form-control" style="width:30%;display:inline;">
                </div>
            </div>
            <div ng-show="sel_endereco == 'Logradouro'">
                <div>
                    <span>CEP:</span> 
                    <span style="position:relative;left:11%">Logradouro: <span style="color:red;">*</span></span> 
                    <br>
                    <input id="cep" name="cep" type="text" class="form-control" style="width:15%;display:inline;" ng-model="cep">                
                    <input id="logradouro" name="logradouro" type="text" class="form-control" style="width:84%;display:inline;">
                </div>
                <div>
                    <span>Número: </span> <span style="color:red;">*</span>
                    <span style="position:relative;left:25%">Bairro: <span style="color:red;">*</span></span> 
                    <br>
                    <input id="complemento" name="complemento" type="text" class="form-control" style="width:35%;display:inline;">
                    <input id="bairro" name="bairro" type="text" class="form-control" style="width:64%;display:inline;">
                </div>
                <div>
                    <span>Cidade: </span> <span style="color:red;">*</span>
                    <span style="position:relative;left:32%">Referência: <span style="color:red;">*</span></span>
                    <br>
                    <input id="cidade" name="cidade" type="text" class="form-control" style="width:40%;display:inline;">
                    <input name="referencia" type="text" class="form-control" style="width:59%;display:inline;">
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
                            <input id="id_pessoa" type="hidden" value="">
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
</div>
</div>
