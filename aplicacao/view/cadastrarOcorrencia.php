<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <form method="post" action="processa_cadastrar_ocorrencia.php">
        <div class="box">
            
            <div>
                Endereço principal:
                <label for="endereco_principal"></label>
                <select name="endereco_principal" class="form-control" ng-model="sel_endereco">
                    <option value="Coordenada">Coordenada</option>
                    <option value="Logradouro">Logradouro</option>
                </select>
            </div>
            <div ng-if="sel_endereco === 'Coordenada'">
                <div>
                    Longitude:
                    <input name="longitude" type="text" class="form-control">
                </div>
                <div>
                    Latitude:
                    <input name="latitude" type="text" class="form-control">
                </div>
            </div>
            <div>
                CEP:
                <input id="cep" name="cep" type="text" class="form-control" ng-model="cep">
            </div>
            <div>
                Logradouro:
                <input id="logradouro" name="logradouro" type="text" class="form-control">
            </div>
            <div>
                Número:
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
        <div class="box">
            <div>
                Agente principal:
                <input name="agente_principal" type="text" class="form-control">
            </div>
            <div>
                Agente de apoio 1:
                <input name="agente_apoio_1" type="text" class="form-control">
            </div>
            <div>
                Agente de apoio 2:
                <input name="agente_apoio_2" type="text" class="form-control">
            </div>
        </div>
        <div class="box">
            Ocorrência retorno:
            <br>
            <nav>
                <label class="radio-inline">
                    <input type="radio" value="true" name="ocorr_retorno">Sim
                </label>
                <label class="radio-inline">
                    <input type="radio" value="false" name="ocorr_retorno" checked>Não
                </label>
            </nav>
            <br>
            <div>
                Código de referência:
                <input name="ocorr_referencia" type="text" class="form-control">
            </div>
            <div>
                Data de lançamento:
                <input name="data_lancamento" type="date" placeholder="DD/MM/YYYY" class="form-control">
            </div>
            <div>
                Data de ocorrência:
                <input name="data_ocorrencia" type="date" placeholder="DD/MM/YYYY" class="form-control">
            </div>
            <div>
                Descrição:
                <textarea name="descricao" class="form-control" cols="30" rows="5" maxlength = "100"></textarea>
            </div>
            <div>
                Origem:
                <input name="ocorr_origem" type="text" class="form-control">
            </div>
        </div>
        <div class="box">
            <div>
                Pessoa atendida 1:
                <br>
                <input name="pessoa_atendida_1" type="text" class="form-control inline">
                <button type="button" class="btn-default btn-small inline" data-toggle="modal" data-target="#pessoasModal"><span class="glyphicon glyphicon-plus"></span></button>
            </div>
            <div>
                Pessoa atendida 2:
                <br>
                <input name="pessoa_atendida_2" type="text" class="form-control inline">
            </div>
            
        </div>
        <div class="box">
            <div>
                Cobrade:
                <input name="cobrade" type="text" class="form-control">
            </div>
            <div>
                Natureza da ocorrência:
                <input name="natureza" type="text" class="form-control">
            </div>
            Possui fotos:
            <br>
            <nav>
                <label class="radio-inline">
                    <input type="radio" value="true" name="possui_fotos">Sim
                </label>
                <label class="radio-inline">
                    <input type="radio" value="false" name="possui_fotos" checked>Não
                </label>
            </nav>
            <br>
            <div>
                Fotos:
                <button type="button" class="btn btn-default btn-sm inline">Carregar fotos</button>
            </div>
        </div>
        <div class="box">
            <div>
                Prioridade:
                <label for="prioridade"></label>
                <select name="prioridade" class="form-control">
                    <option value="Baixa">Baixa</option>
                    <option value="Média">Média</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
            Analisado:
            <br>
            <nav>
                <label class="radio-inline">
                    <input type="radio" value="true" name="analisado">Sim
                </label>
                <label class="radio-inline">
                    <input type="radio" value="false" name="analisado" checked>Não
                </label>
            </nav>
            <br>
            Congelado:
            <br>
            <nav>
                <label class="radio-inline">
                    <input type="radio" value="true" name="congelado">Sim
                </label>
                <label class="radio-inline">
                    <input type="radio" value="false" name="congelado" checked>Não
                </label>
            </nav>
            <br>
            Encerrado:
            <br>
            <nav>
                <label class="radio-inline">
                    <input type="radio" value="true" name="encerrado">Sim
                </label>
                <label class="radio-inline">
                    <input type="radio" value="false" name="encerrado" checked>Não
                </label>
            </nav>
            <br>
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
                <form method="post" action="processa_cadastrar_pessoa.php">
                    <div class="modal-body">
                        <nav>
                            <div class="form-group">
                                Nome:
                                <input name="nome_pessoa" type="text" class="form-control">
                            </div>   
                            <div class="form-group">
                                CPF:
                                <input name="cpf_pessoa" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                Passaporte:
                                <input name="passaporte_pessoa" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                Telefone: 
                                <input name="telefone_pessoa" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                Email:
                                <input name="email_pessoa" type="email" class="form-control">
                            </div>
                        </nav>
                    </div>
                    <div class="modal-footer">
                        <button type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>