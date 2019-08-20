<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <form method="post" action="processa_cadastrar_chamado.php" onsubmit="return validarFormCadastroChamado()">
        <?php if(isset($_GET['sucesso'])){ ?>
            <div class="alert alert-success" role="alert">
                Chamado cadastrada com sucesso.
            </div>
            <?php } ?>
            <?php if(isset($_GET['erroDB'])){ ?>
            <div class="alert alert-danger" role="alert">
                Falha ao cadastrar chamado.
            </div>
        <?php } ?>
        <div class="box">
            <div class="row cabecalho">
                <div class="col-sm-6">
                    <nav class="texto-cabecalho">Estado de Santa Catarina</nav>
                    <nav class="texto-cabecalho">Prefeitura de Balneário Camboriú</nav>
                    <nav class="texto-cabecalho">Secretaria de segunrança</nav>
                    <nav class="texto-cabecalho">Defesa Civil</nav>
                </div>
                <div class="col-sm-6">
                    <img src="images/balneario-camboriu.png" alt="prefeitura-balneario-camboriu" class="img-cabecalho">
                </div>
            </div>
            <h3 class="text-center">Registro de chamado</h3>
        <hr>
            <div class="row">
                <div class="col-sm-4">
                    <span>Data: <span style="color:red;">*</span></span>
                    <input id="data_chamado" name="data_chamado" type="date" class="form-control" max="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="col-sm-4">
                    <span>Horário: <span style="color:red;">*</span></span>
                    <input type="time" name="horario_chamado" class="form-control" required>
                </div>
            </div>
            <div>
                Origem: <span style="color:red;">*</span>
                <input type="text" name="origem_chamado" class="form-control" required>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    Pessoa atendida: <span style="color:red;">*</span>
                    <input type="text" id="pessoa_nome" name="nome_chamado" class="form-control inline" onkeyup="showResult(this.value,this.id)" required>
                    <div class="autocomplete" id="livesearchpessoa_nome"></div>
                    <div id="resultpessoa_nome"></div>

                    <?php if(isset($_GET['nome'])){ ?>
                        <span class="alertErro">Pessoa não encontrada, por favor faça um novo cadastro.</span>
                    <?php } ?>
                </div>
                <div class="col-sm-2">
                    <br>
                    <button type="button" class="btn-default btn-small inline open-AddBookDialog" data-toggle="modal" data-id="pessoa_nome"><span class="glyphicon glyphicon-plus"></span></button>
                </div>
            </div>
        <hr>
            <div>
                Endereço principal: <span style="color:red;">*</span>
                <br>
                <label for="endereco_principal"></label>
                <select name="endereco_principal" class="form-control endereco-principal" ng-model="sel_endereco" ng-init="sel_endereco='Coordenada'" required>
                    <option value="Coordenada">Coordenada</option>
                    <option value="Logradouro">Logradouro</option>
                </select>
            </div>
            <div ng-show="sel_endereco == 'Coordenada'">
                <div class="row">
                    <div class="col-sm-4">
                        <span>Latitude: <span style="color:red;">*</span></span>
                        <input id="latitude" name="latitude" type="text" class="form-control" onchange="verificaLatLgn()">
                    </div>
                    <div class="col-sm-4">
                        <span>Longitude: <span style="color:red;">*</span></span> 
                        <input id="longitude" name="longitude" type="text" class="form-control" onchange="verificaLatLgn()">
                    </div>
                    <div class="col-sm-4">
                        <br>
                        <button type="button" class="btn-default btn-small inline open-AddBookDialog" data-toggle="modal" data-id="map"><span class="glyphicon glyphicon-map-marker"></span></button>
                    </div>
                </div>
                <span id="erroLatLgn" class="alertErro hide">Latitude e/ou Longitude inválida(s).</span>
            </div>
            <div ng-show="sel_endereco == 'Logradouro'">
                <div class="row">
                    <div class="col-sm-3">
                        <span>CEP:</span>
                        <input id="cep" name="cep" type="text" class="form-control" ng-model="cep" maxlength="8" onchange="verificaCep(this.value)">
                        <span id="erroCep" class="alertErro hide">CEP inválido.</span>
                    </div>
                    <div class="col-sm-9">
                        <span>Logradouro: <span style="color:red;">*</span></span>
                        <input id="logradouro" name="logradouro" type="text" class="form-control">
                        <?php if(isset($_GET['logradouro'])){ ?>
                            <span class="alertErro">Erro ao cadastrar logradouro.</span>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <span>Número: </span> <span style="color:red;">*</span>
                        <input id="complemento" name="complemento" type="text" class="form-control">
                    </div>
                    <div class="col-sm-8">
                        <span>Bairro: <span style="color:red;">*</span></span>
                        <input id="bairro" name="bairro" type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <span>Cidade: </span> <span style="color:red;">*</span>
                        <input id="cidade" name="cidade" type="text" class="form-control">
                    </div>
                    <div class="col-sm-7">
                        <span>Referência: <span style="color:red;">*</span></span>
                        <input name="referencia" type="text" class="form-control">
                    </div>
                </div>
            </div>
        <hr>
            <div>
                Descrição: <span style="color:red;">*</span>
                <textarea id="descricao" name="descricao" class="form-control" cols="30" rows="2" maxlength="100" ng-model="descricaoVal" required></textarea>
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
                            <div class="row">
                                <div class="col-sm-12">
                                    Nome: <span style="color:red;">*</span>
                                    <input id="nome_pessoa" name="nome_pessoa" type="text" class="form-control" onchange="verificaNome(this.value)">
                                </div>
                            </div>   
                            <span id="erroNome" class="alertErro hide">Nome inválido.</span>
                            <div class="row">
                                <div class="col-sm-6">
                                    CPF:
                                    <input id="cpf_pessoa" name="cpf_pessoa" type="text" class="form-control" maxlength="11" onchange="verificaCpf(this.value)">
                                    <span id="erroCpf" class="alertErro hide">CPF inválido.</span>
                                </div>
                                <div class="col-sm-6">
                                    Outros documentos:
                                    <input id="outros_documentos" name="outros_documentos" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    Celular: 
                                    <input id="celular_pessoa" name="celular_pessoa" type="text" class="form-control" maxlength="11" onchange="verificaTelefone(this.value)">
                                </div>
                                <div class="col-sm-6">
                                    Telefone: 
                                    <input id="telefone_pessoa" name="telefone_pessoa" type="text" class="form-control" maxlength="10">
                                </div>
                            </div>
                            <span id="erroTelefone" class="alertErro hide">Telefone inválido.</span>
                            <div class="form-group">
                                Email:
                                <input id="email_pessoa" name="email_pessoa" type="email" class="form-control" onchange="verificaEmail(this.value)">
                            </div>
                            <span id="erroEmail" class="alertErro hide">Email inválido.</span>
                        </nav>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="submitFormData" onclick="SubmitFormData()">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="map" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Mapa</h5>
                </div>
                <div class="modal-body">
                    <div id="googleMap" style="width:100%;height:400px;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="submitFormData" onclick="SubmitFormData()" data-dismiss="modal">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
