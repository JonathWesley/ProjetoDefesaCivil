    <div class="container positioning">
    <div class="jumbotron">
        <div class="box">
            <nav>
                <span>Endereço principal:</span>
                <div class="form-group inline">
                    <label for="sel1"></label>
                    <select name="endereco_principal" id="sel1" class="form-control">
                        <option>Coordenada</option>
                        <option>Logradouro</option>
                    </select>
                </div>
            </nav>
            <nav>
                <span>Coordenada principal:</span>
                <div class="form-group inline">
                    <input type="text" class="form-control">
                </div>
            </nav>
            <nav>
                <span>Endereço numeral:</span>
                <div class="form-group inline">
                    <input type="text" class="form-control">
                </div>
            </nav>
            <nav>
                <span>Endereço referência:</span>
                <div class="form-group inline">
                    <input type="text" class="form-control">
                </div>
            </nav>
        </div>

        <div class="box">
            <nav>
                <span>Agente principal:</span>
                <div class="form-group inline">
                    <input type="text" class="form-control">
                </div>
            </nav>
            <nav>
                <span>Agente de apoio 1:</span>
                <div class="form-group inline">
                    <input type="text" class="form-control">
                </div>
            </nav>
            <nav>
                <span>Agente de apoio 2:</span>
                <div class="form-group inline">
                    <input type="text" class="form-control">
                </div>
            </nav>
        </div>
        <div class="box">
            <nav>
                <span>Ocorrência retorno:</span>
                <form class="inline">
                    <label class="radio-inline">
                        <input type="radio" value="1" name="ocorr_retorno_rb">Sim
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="2" name="ocorr_retorno_rb" checked>Não
                    </label>
                </form>
            </nav>
            <nav>
                <span>Código de referência:</span>
                <div class="form-group inline">
                    <input type="text" class="form-control">
                </div>
            </nav>
            <nav>
                <span>Data de lançamento:</span>
                <div class="form-group inline">
                    <input type="date" placeholder="DD/MM/YYYY" class="form-control">
                </div>
            </nav>
            <nav>
                <span>Data de ocorrência:</span>
                <div class="form-group inline">
                    <input type="date" class="form-control">
                </div>
            </nav>
            <nav>
                <span class="descricao">Descrição:</span>
                <form class="inline">
                    <div class="form-group">
                        <textarea class="form-control" cols="30" rows="5" maxlength = "120"></textarea>
                    </div>
                </form>
            </nav>
            <nav>
                <span>Origem:</span>
                <div class="form-group inline">
                    <input type="text" class="form-control">
                </div>
            </nav>
        </div>
        <div class="box">
            <nav>
                <span>Pessoa atendida 1:</span>
                <div class="form-group inline">
                    <input type="text" class="form-control inline" ng-model="ocorrencia.pessoaAtd1">
                    <button class="btn-default btn-small" data-toggle="modal" data-target="#pessoasModal"><span class="glyphicon glyphicon-plus"></span></button>
                    <div class="modal fade" id="pessoasModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Cadastrar pessoa</h5>
                                </div>
                                <div class="modal-body">
                                    <nav>
                                        <span>Nome:</span>
                                        <div class="form-group inline">
                                            <input type="text" class="form-control">
                                        </div><br>
                                        <span>CPF:</span>
                                        <div class="form-group inline">
                                            <input type="text" class="form-control">
                                        </div><br>
                                        <span>Passaporte:</span>
                                        <div class="form-group inline">
                                            <input type="text" class="form-control">
                                        </div><br>
                                        <span>Telefone:</span>
                                        <div class="form-group inline">
                                            <input type="text" class="form-control">
                                        </div><br>
                                        <span>Email:</span>
                                        <div class="form-group inline">
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
                <span>Pessoa atendida 2:</span>
                <div class="form-group inline">
                    <input type="text" class="form-control inline">
                    <button class="btn-default btn-small" data-toggle="modal" data-target="#pessoasModal"><span class="glyphicon glyphicon-plus"></span></button>
                    <div class="modal fade" id="pessoasModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Cadastrar pessoa</h5>
                                </div>
                                <div class="modal-body">
                                    <nav>
                                        <span>Nome:</span>
                                        <div class="form-group inline">
                                            <input type="text" class="form-control">
                                        </div><br>
                                        <span>CPF:</span>
                                        <div class="form-group inline">
                                            <input type="text" class="form-control">
                                        </div><br>
                                        <span>Passaporte:</span>
                                        <div class="form-group inline">
                                            <input type="text" class="form-control">
                                        </div><br>
                                        <span>Telefone:</span>
                                        <div class="form-group inline">
                                            <input type="text" class="form-control">
                                        </div><br>
                                        <span>Email:</span>
                                        <div class="form-group inline">
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
                <span>Cobrade:</span> 
                <div class="form-group inline">
                    <input type="text" class="form-control">
                </div>
            </nav>
            <nav>
                <span>Natureza da ocorrência:</span> 
                <div class="form-group inline">
                    <input type="text" class="form-control">
                </div>
            </nav>
            <nav>
                <span>Possui fotos:</span>
                <form class="inline">
                    <label class="radio-inline">
                        <input type="radio" value="1" name="fotos_rb">Sim
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="2" name="fotos_rb" checked>Não
                    </label>
                </form>
            </nav>
        </div>
        <div class="box">
            <nav>
                <span>Prioridade:</span>
                <div class="form-group inline">
                    <label for="sel1"></label>
                    <select name="endereco_principal" id="sel1" class="form-control">
                        <option>Baixa</option>
                        <option>Média</option>
                        <option>Alta</option>
                    </select>
                </div>
            </nav>
            <nav>
                <span>Analisado:</span>
                <form class="inline">
                    <label class="radio-inline">
                        <input type="radio" value="1" name="analisado_rb">Sim
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="2" name="analisado_rb" checked>Não
                    </label>
                </form>
            </nav>
            <nav>
                <span>Congelado:</span>
                <form class="inline">
                    <label class="radio-inline">
                        <input type="radio" value="1" name="congelado_rb">Sim
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="2" name="congelado_rb" checked>Não
                    </label>
                </form>
            </nav>
            <nav>
                <span>Encerrado:</span>
                <form class="inline">
                    <label class="radio-inline">
                        <input type="radio" value="1" name="encerrado_rb">Sim
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="2" name="encerrado_rb" checked>Não
                    </label>
                </form>
            </nav>
        </div>
        <button class="btn btn-default btn-md">Cadastrar</button>
    </div>
    </div>