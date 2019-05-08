<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <form method="post" action="processa_cadastrar_ocorrencia.php">
        <div class="box">
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
            <div>
                Endereço principal: <span style="color:red;">*</span>
                <label for="endereco_principal"></label>
                <select name="endereco_principal" class="form-control" ng-model="sel_endereco" required>
                    <option value="Coordenada">Coordenada</option>
                    <option value="Logradouro">Logradouro</option>
                </select>
            </div>
            <?php if(isset($_GET['endereco_principal'])){ ?>
                <span class="alertErro">
                    Opção de endereço desconhecida.
                </span>
            <?php } ?>
            <div ng-show="sel_endereco == 'Coordenada'">
                <div>
                    Longitude: <span style="color:red;">*</span>
                    <input name="longitude" type="text" class="form-control">
                </div>
                <?php if(isset($_GET['longitude'])){ ?>
                    <span class="alertErro">
                        Longitude informada incorretamente.
                    </span>
                <?php } ?>
                <div>
                    Latitude: <span style="color:red;">*</span>
                    <input name="latitude" type="text" class="form-control">
                </div>
                <?php if(isset($_GET['latitude'])){ ?>
                    <span class="alertErro">
                        Latitude informada incorretamente.
                    </span>
                <?php } ?>
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
                <?php if(isset($_GET['logradouro'])){ ?>
                    <span class="alertErro">
                        Logradouro informado incorretamente.
                    </span>
                <?php } ?>
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
        </div>
        <div class="box">
            <div>
                Agente principal: <span style="color:red;">*</span>
                <input name="agente_principal" type="text" class="form-control" required>
            </div>
            <?php if(isset($_GET['agente_principal'])){ ?>
                    <span class="alertErro">
                        Agente não encontrado ou informado incorretamente.
                    </span>
                <?php } ?>
            <div>
                Agente de apoio 1:
                <input name="agente_apoio_1" type="text" class="form-control">
            </div>
            <?php if(isset($_GET['agente_apoio_1'])){ ?>
                    <span class="alertErro">
                        Agente não encontrado ou informado incorretamente.
                    </span>
                <?php } ?>
            <div>
            <div>
                Agente de apoio 2:
                <input name="agente_apoio_2" type="text" class="form-control">
            </div>
            <?php if(isset($_GET['agente_apoio_2'])){ ?>
                    <span class="alertErro">
                        Agente não encontrado ou informado incorretamente.
                    </span>
                <?php } ?>
            <div>
        </div>
        <div class="box">
            Ocorrência retorno: <span style="color:red;">*</span>
            <br>
            <nav>
                <label class="radio-inline">
                    <input type="radio" id="ocorr_retorno" ng-model="retorno" ng-value="true" value="true" name="ocorr_retorno">Sim
                </label>
                <label class="radio-inline">
                    <input type="radio" ng-model="retorno" ng-value="false" value="false" name="ocorr_retorno">Não
                </label>
            </nav>
            <br>
            <div ng-switch="retorno">
                Código de referência: <span style="color:red;" ng-switch-when="true">*</span>
                <input id="ocorr_referencia" name="ocorr_referencia" type="text" class="form-control">
            </div>
            <?php if(isset($_GET['ocorr_referencia'])){ ?>
                    <span class="alertErro">
                        Referencia incorreta.
                    </span>
                <?php } ?>
            <div>
            <div>
                Data de lançamento: <span style="color:red;">*</span>
                <input name="data_lancamento" type="date" placeholder="DD/MM/YYYY" class="form-control" required>
            </div>
            <?php if(isset($_GET['data_lancamento'])){ ?>
                <span class="alertErro">
                    Data incorreta.
                </span>
            <?php } ?>
            <?php if(isset($_GET['data_ocorrencia_lancamento'])){ ?>
                    <span class="alertErro">
                        Data de lançamento não pode ser maior que a data da ocorrência.
                    </span>
                <?php } ?>
            <div>
            <div>
                Data de ocorrência: <span style="color:red;">*</span>
                <input name="data_ocorrencia" type="date" placeholder="DD/MM/YYYY" class="form-control" required>
            </div>
            <?php if(isset($_GET['data_ocorrencia'])){ ?>
                <span class="alertErro">
                    Data incorreta.
                </span>
            <?php } ?>
            <div>
                Descrição:
                <textarea id="descricao" name="descricao" class="form-control" cols="30" rows="2" maxlength = "100" ng-model="descricaoVal"></textarea>
                <span class="char-count">{{descricaoVal.length || 0}}/100</span>
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
                <input name="pessoa_atendida_1" type="text" class="form-control inline" value="<?php if(isset($_POST['nome_pessoa'])){echo "a".$_POST['nome_pessoa'];} ?>">
                <button type="button" class="btn-default btn-small inline" data-toggle="modal" data-target="#pessoasModal"><span class="glyphicon glyphicon-plus"></span></button>
            </div>
            <?php if(isset($_GET['pessoa_atendida_1'])){ ?>
                <span class="alertErro">
                    Pessoa não encontrada ou informada incorretamente.
                </span>
            <?php } ?>
            <div>
                Pessoa atendida 2:
                <br>
                <input name="pessoa_atendida_2" type="text" class="form-control inline">
            </div>
            <?php if(isset($_GET['pessoa_atendida_2'])){ ?>
                <span class="alertErro">
                    Pessoa não encontrada ou informada incorretamente.
                </span>
            <?php } ?>
        </div>
        <div class="box">
            <div>
                Cobrade: 
                <?php if(isset($_GET['cobrade'])){ ?>
                    <br><span class="alertErro">
                        Cobrade incorreto.
                    </span>
                <?php } ?>
                <div class="cobrade">
                    Categoria: <span style="color:red;">*</span><br>
                    <select name="cobrade_categoria" class="form-control" ng-model="categoria">
                        <option value="1">Naturais</option>
                        <option value="2">Tecnológicos</option>
                    </select>
                    Grupo: <span style="color:red;" ng-hide="categoria == 0">*</span><br>
                    <select name="cobrade_grupo" class="form-control" ng-model="grupo" ng-disabled="categoria == 0">
                        <option ng-if="categoria==1" value="1">Geológico</option>
                        <option ng-if="categoria==1" value="2">Hidrológico</option>
                        <option ng-if="categoria==1" value="3">Meteorológico</option>
                        <option ng-if="categoria==1" value="4">Climatólogo</option>
                        <option ng-if="categoria==1" value="5">Biológico</option>
                        <option ng-if="categoria==2" value="1">Desastres Relacionados a Substâncias radioativas</option>
                        <option ng-if="categoria==2" value="2">Desastres Relacionados a Produtos Perigosos</option>
                        <option ng-if="categoria==2" value="3">Desastres Relacionados a Incêndios Urbanos</option>
                        <option ng-if="categoria==2" value="4">Desastres relacionados a obras civis</option>
                        <option ng-if="categoria==2" value="5">Desastres relacionados a transporte de passageiros e cargas não perigosas</option>
                    </select>
                    Subgrupo: <span style="color:red;" ng-hide="grupo == 0">*</span><br>
                    <select name="cobrade_subgrupo" class="form-control" ng-model="subgrupo" ng-disabled="grupo == 0">
                        <option ng-if="grupo==1&&categoria==1" value="1">Terremoto</option>
                        <option ng-if="grupo==1&&categoria==1" value="2">Emanação vulcânica</option>
                        <option ng-if="grupo==1&&categoria==1" value="3">Movimento de massa</option>
                        <option ng-if="grupo==1&&categoria==1" value="4">Erosão</option>
                        <option ng-if="grupo==2&&categoria==1" value="1">Inundações</option>
                        <option ng-if="grupo==2&&categoria==1" value="2">Enxurradas</option>
                        <option ng-if="grupo==2&&categoria==1" value="3">Alagamentos</option>
                        <option ng-if="grupo==3&&categoria==1" value="1">Sistemas de Grande Escala/Escala Regional</option>
                        <option ng-if="grupo==3&&categoria==1" value="2">Tempestades</option>
                        <option ng-if="grupo==3&&categoria==1" value="3">Temperaturas Extremas</option>
                        <option ng-if="grupo==4&&categoria==1" value="1">Seca</option>
                        <option ng-if="grupo==5&&categoria==1" value="1">Epidemias</option>
                        <option ng-if="grupo==5&&categoria==1" value="2">Infestações/Pragas</option>
                        <option ng-if="grupo==1&&categoria==2" value="1">Desastres siderais com riscos radioativos</option>
                        <option ng-if="grupo==1&&categoria==2" value="2">Desastres com substâncias e equipamentos radioativos de uso em pesquisas, indústrias e usinas nucleares</option>
                        <option ng-if="grupo==1&&categoria==2" value="3">Desastres relacionados com riscos de intensa poluição ambiental provocada por resíduos radioativos</option>
                        <option ng-if="grupo==2&&categoria==2" value="1">Desastres em plantas e distritos industriais, parques e armazenamentos com extravasamento de produtos perigosos</option>
                        <option ng-if="grupo==2&&categoria==2" value="2">Desastres relacionados à contaminação da água</option>
                        <option ng-if="grupo==2&&categoria==2" value="3">Desastres Relacionados a Conflitos Bélicos</option>
                        <option ng-if="grupo==2&&categoria==2" value="4">Desastres relacionados a transporte de produtos perigosos</option>
                        <option ng-if="grupo==3&&categoria==2" value="1">Incêndios urbanos</option>
                        <option ng-if="grupo==4&&categoria==2" value="1">Colapso de edificações</option>
                        <option ng-if="grupo==4&&categoria==2" value="2">Rompimento/colapso de barragens</option>
                        <option ng-if="grupo==5&&categoria==2" value="1">Transporte rodoviário</option>
                        <option ng-if="grupo==5&&categoria==2" value="2">Transporte ferroviário</option>
                        <option ng-if="grupo==5&&categoria==2" value="3">Transporte aéreo</option>
                        <option ng-if="grupo==5&&categoria==2" value="4">Transporte marítimo</option>
                        <option ng-if="grupo==5&&categoria==2" value="5">Transporte aquaviário</option>
                    </select>
                    Tipo: <span style="color:red;" ng-hide="subgrupo == 0">*</span><br>
                    <select name="cobrade_tipo" class="form-control" ng-model="tipo" ng-disabled="subgrupo==0">
                        <option ng-if="subgrupo==1&&grupo==1&&categoria==1" value="1">Tremor de terra</option>
                        <option ng-if="subgrupo==1&&grupo==1&&categoria==1" value="2">Tsunami</option>
                        <option ng-if="subgrupo==2&&grupo==1&&categoria==1" value="0"></option>
                        <option ng-if="subgrupo==3&&grupo==1&&categoria==1" value="1">Quedas, Tombamentos e rolamentos</option>
                        <option ng-if="subgrupo==3&&grupo==1&&categoria==1" value="2">Deslizamentos</option>
                        <option ng-if="subgrupo==3&&grupo==1&&categoria==1" value="3">Corridas de Massa</option>
                        <option ng-if="subgrupo==3&&grupo==1&&categoria==1" value="4">Subsidências e colapsos</option>
                        <option ng-if="subgrupo==4&&grupo==1&&categoria==1" value="1">Erosão Costeira/Marinha</option>
                        <option ng-if="subgrupo==4&&grupo==1&&categoria==1" value="2">Erosão de Margem Fluvial</option>
                        <option ng-if="subgrupo==4&&grupo==1&&categoria==1" value="3">Erosão Continental</option>
                        <option ng-if="grupo==2&&categoria==1" value="0"></option>
                        <option ng-if="subgrupo==1&&grupo==3&&categoria==1" value="1">Ciclones</option>
                        <option ng-if="subgrupo==1&&grupo==3&&categoria==1" value="2">Frentes Frias/Zonas de Convergência</option>
                        <option ng-if="subgrupo==2&&grupo==3&&categoria==1" value="1">Tempestade Local/Convectiva</option>
                        <option ng-if="subgrupo==3&&grupo==3&&categoria==1" value="1">Onda de Calor</option>
                        <option ng-if="subgrupo==3&&grupo==3&&categoria==1" value="2">Onda de Frio</option>
                        <option ng-if="subgrupo==1&&grupo==4&&categoria==1" value="1">Estiagem</option>
                        <option ng-if="subgrupo==1&&grupo==4&&categoria==1" value="2">Seca</option>
                        <option ng-if="subgrupo==1&&grupo==4&&categoria==1" value="3">Incêndio Florestal</option>
                        <option ng-if="subgrupo==1&&grupo==4&&categoria==1" value="4">Baixa Humidade do Ar</option>
                        <option ng-if="subgrupo==1&&grupo==5&&categoria==1" value="1">Doenças infecciosas virais </option>
                        <option ng-if="subgrupo==1&&grupo==5&&categoria==1" value="2">Doenças infecciosas bacterianas</option>
                        <option ng-if="subgrupo==1&&grupo==5&&categoria==1" value="3">Doenças infecciosas parasíticas</option>
                        <option ng-if="subgrupo==1&&grupo==5&&categoria==1" value="4">Doenças infecciosas fúngicas</option>
                        <option ng-if="subgrupo==2&&grupo==5&&categoria==1" value="1">Infestações de animais</option>
                        <option ng-if="subgrupo==2&&grupo==5&&categoria==1" value="2"> Infestações de algas</option>
                        <option ng-if="subgrupo==2&&grupo==5&&categoria==1" value="3">Outras Infestações</option>
                        <option ng-if="subgrupo==1&&grupo==1&&categoria==2" value="1">Queda de satélite (radionuclídeos)</option>
                        <option ng-if="subgrupo==2&&grupo==1&&categoria==2" value="1">ontes radioativas em processos de produção</option>
                        <option ng-if="subgrupo==3&&grupo==1&&categoria==2" value="1">Outras fontes de liberação de radionuclídeos para o meio ambiente</option>
                        <option ng-if="subgrupo==1&&grupo==2&&categoria==2" value="1">Liberação de produtos químicos para a atmosfera causada por explosão ou incêndio</option>
                        <option ng-if="subgrupo==2&&grupo==2&&categoria==2" value="1">Liberação de produtos químicos nos sistemas de água potável</option>
                        <option ng-if="subgrupo==2&&grupo==2&&categoria==2" value="2">Derramamento de produtos químicos em ambiente lacustre, fluvial, marinho e aquíferos</option>
                        <option ng-if="subgrupo==3&&grupo==2&&categoria==2" value="1">Liberação produtos químicos e contaminação como conseqüência de ações militares.</option>
                        <option ng-if="subgrupo==4&&grupo==2&&categoria==2" value="1">Transporte rodoviário</option>
                        <option ng-if="subgrupo==4&&grupo==2&&categoria==2" value="2">Transporte ferroviário</option>
                        <option ng-if="subgrupo==4&&grupo==2&&categoria==2" value="3">Transporte aéreo</option>
                        <option ng-if="subgrupo==4&&grupo==2&&categoria==2" value="4">Transporte dutoviário</option>
                        <option ng-if="subgrupo==4&&grupo==2&&categoria==2" value="5">Transporte marítimo</option>
                        <option ng-if="subgrupo==4&&grupo==2&&categoria==2" value="6">Transporte aquaviário</option>
                        <option ng-if="subgrupo==1&&grupo==3&&categoria==2" value="1">Incêndios em plantas e distritos industriais, parques e depósitos</option>
                        <option ng-if="subgrupo==1&&grupo==3&&categoria==2" value="2">Incêndios em aglomerados residenciais</option>
                        <option ng-if="grupo==4&&categoria==2" value="0"></option>
                        <option ng-if="grupo==5&&categoria==2" value="0"></option>
                    </select>
                    Subtipo: <span style="color:red;" ng-hide="tipo==0 || categoria==2">*</span><br>
                    <select name="cobrade_subtipo" class="form-control" ng-model="subtipo" ng-disabled="tipo==0 || categoria==2">
                        <option ng-if="subgrupo==1&&grupo==1&&categoria==1" value="0"></option>
                        <option ng-if="subgrupo==2&&grupo==1&&categoria==1" value="0"></option>
                        <option ng-if="tipo==1&&subgrupo==3&&grupo==1&&categoria==1" value="1">Blocos</option>
                        <option ng-if="tipo==1&&subgrupo==3&&grupo==1&&categoria==1" value="2">Lascas</option>
                        <option ng-if="tipo==1&&subgrupo==3&&grupo==1&&categoria==1" value="3">Matacões</option>
                        <option ng-if="tipo==1&&subgrupo==3&&grupo==1&&categoria==1" value="4">Lajes</option>
                        <option ng-if="tipo==2&&subgrupo==3&&grupo==1&&categoria==1" value="1">Deslizamentos de solo e ou rocha</option>
                        <option ng-if="tipo==3&&subgrupo==3&&grupo==1&&categoria==1" value="1">Solo/Lama</option>
                        <option ng-if="tipo==3&&subgrupo==3&&grupo==1&&categoria==1" value="2">Rocha/Detrito</option>
                        <option ng-if="tipo==4&&subgrupo==3&&grupo==1&&categoria==1" value="0"></option>
                        <option ng-if="tipo==1&&subgrupo==4&&grupo==1&&categoria==1" value="0"></option>
                        <option ng-if="tipo==2&&subgrupo==4&&grupo==1&&categoria==1" value="0"></option>
                        <option ng-if="tipo==3&&subgrupo==4&&grupo==1&&categoria==1" value="1">Laminar</option>
                        <option ng-if="tipo==3&&subgrupo==4&&grupo==1&&categoria==1" value="2">Ravinas</option>
                        <option ng-if="tipo==3&&subgrupo==4&&grupo==1&&categoria==1" value="3">Boçorocas</option>
                        <option ng-if="grupo==2&&categoria==1" value="0"></option>
                        <option ng-if="tipo==1&&subgrupo==1&&grupo==3&&categoria==1" value="1">Ventos Costeiros (Mobilidade de Dunas)</option>
                        <option ng-if="tipo==1&&subgrupo==1&&grupo==3&&categoria==1" value="2">Marés de Tempestade (Ressacas)</option>
                        <option ng-if="tipo==2&&subgrupo==1&&grupo==3&&categoria==1" value="0"></option>
                        <option ng-if="tipo==1&&subgrupo==2&&grupo==3&&categoria==1" value="1">Tornados</option>
                        <option ng-if="tipo==1&&subgrupo==2&&grupo==3&&categoria==1" value="2">Tempestade de Raios</option>
                        <option ng-if="tipo==1&&subgrupo==2&&grupo==3&&categoria==1" value="3">Granizo</option>
                        <option ng-if="tipo==1&&subgrupo==2&&grupo==3&&categoria==1" value="4">Chuvas Intensas</option>
                        <option ng-if="tipo==1&&subgrupo==2&&grupo==3&&categoria==1" value="5">Vendaval</option>
                        <option ng-if="tipo==1&&subgrupo==3&&grupo==3&&categoria==1" value="0"></option>
                        <option ng-if="tipo==2&&subgrupo==3&&grupo==3&&categoria==1" value="1">Friagem</option>
                        <option ng-if="tipo==2&&subgrupo==3&&grupo==3&&categoria==1" value="2">Geadas</option>
                        <option ng-if="tipo==1&&subgrupo==1&&grupo==4&&categoria==1" value="0"></option>
                        <option ng-if="tipo==2&&subgrupo==1&&grupo==4&&categoria==1" value="0"></option>
                        <option ng-if="tipo==3&&subgrupo==1&&grupo==4&&categoria==1" value="1">Incêndios em Parques, Áreas de Proteção Ambiental e Áreas de Preservação Permanente Nacionais, Estaduais ou Municipais</option>
                        <option ng-if="tipo==3&&subgrupo==1&&grupo==4&&categoria==1" value="2">Incêndios em áreas não protegidas, com reflexos na qualidade do ar</option>
                        <option ng-if="tipo==4&&subgrupo==1&&grupo==4&&categoria==1" value="0"></option>
                        <option ng-if="subgrupo==1&&grupo==5&&categoria==1" value="0"></option>
                        <option ng-if="tipo==1&&subgrupo==2&&grupo==5&&categoria==1" value="0"></option>
                        <option ng-if="tipo==2&&subgrupo==2&&grupo==5&&categoria==1" value="1">Marés vermelhas</option>
                        <option ng-if="tipo==2&&subgrupo==2&&grupo==5&&categoria==1" value="2">Ciano bactérias em reservatórios</option>
                        <option ng-if="tipo==3&&subgrupo==2&&grupo==5&&categoria==1" value="0"></option>
                        <option ng-if="categoria==2" value="0"></option>
                    </select>
                </div>
            </div>
            <br>
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
                Prioridade: <span style="color:red;">*</span>
                <label for="prioridade"></label>
                <select name="prioridade" class="form-control" required>
                    <option value="Baixa">Baixa</option>
                    <option value="Média">Média</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
            <?php if(isset($_GET['prioridade'])){ ?>
                <span class="alertErro">
                    Prioridade informada incorretamente.
                </span><br>
            <?php } ?>
            Analisado: <span style="color:red;">*</span>
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
            Congelado: <span style="color:red;">*</span>
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
            Encerrado: <span style="color:red;">*</span>
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
                                Passaporte:
                                <input id="pass_pessoa" name="pass_pessoa" type="text" class="form-control">
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
        var pass_pessoa = $("#pass_pessoa").val();
        
        $.post("processa_cadastrar_pessoa.php", { nome_pessoa: nome_pessoa, email_pessoa: email_pessoa,
            telefone_pessoa: telefone_pessoa, cpf_pessoa: cpf_pessoa, pass_pessoa:pass_pessoa },
        function(data) {
         //$('#results').html(data);
         //$('#myForm')[0].reset();
        });
    }
    </script>


</div>
</div>
