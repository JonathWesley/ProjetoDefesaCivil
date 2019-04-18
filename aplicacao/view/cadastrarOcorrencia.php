    <div class="container positioning">
    <div class="jumbotron campo_cadastro">
        <div class="box">
            <form method="post" action="processa_cadastrar_ocorrencia.php">
            <nav>
                <div class="form-group">
                    Endereço principal:
                    <label for="sel_endereco"></label>
                    <select name="sel_endereco" class="form-control" ng-model="sel_endereco.singleSelect">
                        <option value="Coordenada">Coordenada</option>
                        <option value="Logradouro">Logradouro</option>
                    </select>
                </div>
            </nav>
            <nav>
                Longitude:
                <div class="form-group">
                    <input name="longitude" type="text" class="form-control">
                </div>
            </nav>
            <nav>
                Latitude:
                <div class="form-group">
                    <input name="latitude" type="text" class="form-control">
                </div>
            </nav>
            <nav>
                Logradouro:
                <div class="form-group">
                    <input name="logradouro" type="text" class="form-control">
                </div>
            </nav>
            <nav>
                Número:
                <div class="form-group">
                    <input name="numero" type="text" class="form-control">
                </div>
            </nav>
            <nav>
                Referência:
                <div class="form-group">
                    <input name="referencia" type="text" class="form-control">
                </div>
            </nav>
        </div>

        <div class="box">
            <nav>
                Agente principal:
                <div class="form-group">
                    <input name="agente_principal" type="text" class="form-control">
                </div>
            </nav>
            <nav>
                Agente de apoio 1:
                <div class="form-group">
                    <input name="agente_apoio_1" type="text" class="form-control">
                </div>
            </nav>
            <nav>
                Agente de apoio 2:
                <div class="form-group">
                    <input name="agente_apoio_2" type="text" class="form-control">
                </div>
            </nav>
        </div>
        <div class="box">
            <nav>
                Ocorrência retorno:
                <br>
                <form name="ocorr_retorno">
                    <label class="radio-inline">
                        <input type="radio" value="1" name="ocorr_retorno_rb">Sim
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="2" name="ocorr_retorno_rb" checked>Não
                    </label>
                </form>
            </nav>
            <br>
            <nav>
                Código de referência:
                <div class="form-group">
                    <input name="ocorr_referencia" type="text" class="form-control">
                </div>
            </nav>
            <nav>
                Data de lançamento:
                <div class="form-group">
                    <input name="data_lancamento" type="date" placeholder="DD/MM/YYYY" class="form-control">
                </div>
            </nav>
            <nav>
                Data de ocorrência:
                <div class="form-group">
                    <input name="data_ocorrencia" type="date" class="form-control">
                </div>
            </nav>
            <nav>
                Descrição:
                <form>
                    <div class="form-group">
                        <textarea name="data_descricao" class="form-control" cols="30" rows="5" maxlength = "120"></textarea>
                    </div>
                </form>
            </nav>
            <nav>
                Origem:
                <div class="form-group">
                    <input name="ocorr_origem" type="text" class="form-control">
                </div>
            </nav>
        </div>
        <div class="box">
            <nav>
                <div class="form-group">
                    Pessoa atendida 1: 
                    <br>
                    <input name="pessoa_atendida_1" type="text" class="form-control inline" ng-model="ocorrencia.pessoaAtd1">
                    <button class="btn-default btn-small inline" data-toggle="modal" data-target="#pessoasModal"><span class="glyphicon glyphicon-plus"></span></button>
                    <div class="modal fade" id="pessoasModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Cadastrar pessoa</h5>
                                </div>
                                <div class="modal-body">
                                    <nav>
                                        <div class="form-group">
                                            Nome:
                                            <input type="text" class="form-control">
                                        </div>   
                                        <div class="form-group">
                                            CPF:
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            Passaporte:
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            Telefone: 
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            Email:
                                            <input type="text" class="form-control">
                                        </div>
                                    </nav>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal">Cadastrar</button>
                                </div>
                          </div>
                        </div>
                    </div>
                </div>
            </nav>
            <nav>
                <div class="form-group">
                    Pessoa atendida 2:
                    <br>
                    <input name="pessoa_atendida_2" type="text" class="form-control inline">
                    <button class="btn-default btn-small inline" data-toggle="modal" data-target="#pessoasModal"><span class="glyphicon glyphicon-plus"></span></button>
                    <div class="modal fade" id="pessoasModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Cadastrar pessoa</h5>
                                </div>
                                <div class="modal-body">
                                    <nav>
                                        <div class="form-group">
                                            Nome:
                                            <input type="text" class="form-control">
                                        </div>   
                                        <div class="form-group">
                                            CPF:
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            Passaporte:
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            Telefone: 
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            Email:
                                            <input type="text" class="form-control">
                                        </div>
                                    </nav>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal">Cadastrar</button>
                                </div>
                          </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="box">
            <nav>
                Cobrade:
                <div class="form-group">
                    <input name="cobrade" type="text" class="form-control">
                </div>
            </nav>
            <nav>
                Natureza da ocorrência:
                <div class="form-group">
                    <input name="natureza" type="text" class="form-control">
                </div>
            </nav>
            <nav>
                Possui fotos:
                <form name="possui_fotos">
                    <label class="radio-inline">
                        <input type="radio" value="1" name="fotos_rb">Sim
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="2" name="fotos_rb" checked>Não
                    </label>
                </form>
            </nav>
            <br>
            <nav>
                Fotos:
                <button type="btn" class="btn btn-default btn-sm inline">Carregar fotos</button>
            </nav>
        </div>
        <div class="box">
            <nav>
                <div class="form-group">
                    Prioridade:
                    <label for="sel1"></label>
                    <select name="prioridade" id="sel1" class="form-control">
                        <option>Baixa</option>
                        <option>Média</option>
                        <option>Alta</option>
                    </select>
                </div>
            </nav>
            <nav>
                Analisado:
                <form name="analisado">
                    <label class="radio-inline">
                        <input type="radio" value="1" name="analisado_rb">Sim
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="2" name="analisado_rb" checked>Não
                    </label>
                </form>
            </nav>
            <br>
            <nav>
                Congelado:
                <form name="congelado">
                    <label class="radio-inline">
                        <input type="radio" value="1" name="congelado_rb">Sim
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="2" name="congelado_rb" checked>Não
                    </label>
                </form>
            </nav>
            <br>
            <nav>
                Encerrado:
                <form name="encerrado">
                    <label class="radio-inline">
                        <input type="radio" value="1" name="encerrado_rb">Sim
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="2" name="encerrado_rb" checked>Não
                    </label>
                </form>
            </nav>
        </div>
        <input type="submit" class="btn btn-default btn-md" value="Cadastrar"></button>
        </form>
    </div>
    </div>