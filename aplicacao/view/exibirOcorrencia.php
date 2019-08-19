<?php
    include 'database.php';

    $id_ocorrencia = $_GET['id'];

    $query = "SELECT * FROM ocorrencia WHERE id_ocorrencia = $id_ocorrencia";
    $result = pg_query($connection, $query) or die(pg_last_error());
    $linhaOcorrencia = pg_fetch_array($result, 0);

    if($linhaOcorrencia['ocorr_endereco_principal'] == "Logradouro"){
        $id_logradouro = $linhaOcorrencia['ocorr_logradouro_id'];
        $query = "SELECT * FROM endereco_logradouro WHERE id_logradouro = $id_logradouro";
        $result = pg_query($connection, $query) or die(pg_last_error());
        $linhaLogradouro = pg_fetch_array($result, 0);
    }
    
    $id_agente = $linhaOcorrencia['agente_principal'];
    $query = "SELECT nome FROM usuario WHERE id_usuario = $id_agente";
    $result = pg_query($connection, $query) or die(pg_last_error());
    $linhaAgentePrincipal = pg_fetch_array($result, 0);

    $id_usuario_criador = $linhaOcorrencia['usuario_criador'];
    $query = "SELECT nome FROM usuario WHERE id_usuario = $id_usuario_criador";
    $result = pg_query($connection, $query) or die(pg_last_error());
    $linhaUsuarioCriador = pg_fetch_array($result, 0);

    if($linhaOcorrencia['agente_apoio_1']){
        $id_agente = $linhaOcorrencia['agente_apoio_1'];
        $query = "SELECT nome FROM usuario WHERE id_usuario = $id_agente";
        $result = pg_query($connection, $query) or die(pg_last_error());
        $linhaAgente1 = pg_fetch_array($result, 0);
    }
    if($linhaOcorrencia['agente_apoio_2']){
        $id_agente = $linhaOcorrencia['agente_apoio_2'];
        $query = "SELECT nome FROM usuario WHERE id_usuario = $id_agente";
        $result = pg_query($connection, $query) or die(pg_last_error());
        $linhaAgente2 = pg_fetch_array($result, 0);
    }
    if($linhaOcorrencia['atendido_1']){
        $id_pessoa = $linhaOcorrencia['atendido_1'];
        $query = "SELECT nome FROM pessoa WHERE id_pessoa = $id_pessoa";
        $result = pg_query($connection, $query) or die(pg_last_error());
        $linhaPessoa1 = pg_fetch_array($result, 0);
    }
    if($linhaOcorrencia['atendido_2']){
        $id_pessoa = $linhaOcorrencia['atendido_2'];
        $query = "SELECT nome FROM pessoa WHERE id_pessoa = $id_pessoa";
        $result = pg_query($connection, $query) or die(pg_last_error());
        $linhaPessoa2 = pg_fetch_array($result, 0);
    }

    $cobrade = $linhaOcorrencia['ocorr_cobrade'];
    $query = "SELECT * FROM cobrade WHERE codigo = '$cobrade'";
    $result = pg_query($connection, $query) or die(pg_last_error());
    $linhaCobrade = pg_fetch_array($result, 0);

    $query = "SELECT id_interdicao FROM interdicao WHERE id_ocorrencia = $id_ocorrencia";
    $result = pg_query($connection, $query) or die(pg_last_error());
    $id_interdicao = pg_fetch_array($result, 0)['id_interdicao'];
?>

<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <?php if(isset($_GET['sucesso'])){ ?>
            <div class="alert alert-success" role="alert">
                Ocorrencia alterada com sucesso.
            </div>
    <?php } ?>
    <?php if(isset($_GET['sucessoInterdicao'])){ ?>
            <div class="alert alert-success" role="alert">
                Desinterditado com sucesso.
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
        <h3 class="text-center">Registro de ocorrência</h3>
    </div>
    <div class="box">
        <h4>Endereço</h4>
        <hr>
        <span class="titulo">Endereço principal: </span><span id="coordenada_principal" ng-model="sel_endereco" ng-init="sel_endereco='<?php echo $linhaOcorrencia['ocorr_endereco_principal']; ?>'"><?php echo $linhaOcorrencia['ocorr_endereco_principal']; ?></span>
        <div ng-show="sel_endereco == 'Logradouro'">
            <div class="row">
                <div class="col-sm-3"><span class="titulo">CEP: </span><?php echo $linhaLogradouro['cep']; ?></div>
                <div class="col-sm-6"><span class="titulo">Logradouro: </span><?php echo $linhaLogradouro['logradouro']; ?></div>
                <div class="col-sm-3"><span class="titulo">Número: </span><?php echo $linhaLogradouro['numero']; ?></div>
            </div>
            <div class="row">
                <div class="col-sm-3"><span class="titulo">Bairro: </span><?php echo $linhaLogradouro['bairro']; ?></div>
                <div class="col-sm-6"><span class="titulo">Cidade: </span><?php echo $linhaLogradouro['cidade']; ?></div>
            </div>
            <nav><span class="titulo">Referência: </span><?php echo $linhaLogradouro['referencia']; ?></nav><br>
        </div>
        <div ng-show="sel_endereco == 'Coordenada'">
            <nav>
                <span class="titulo">Latitude: </span><span id="latitude" ><?php echo $linhaOcorrencia['ocorr_coordenada_latitude']; ?></span>
            </nav>
            <nav class="inline">
            <span class="titulo">Longitude: </span><span id="longitude" ><?php echo $linhaOcorrencia['ocorr_coordenada_longitude']; ?></span>
            </nav>
            <button type="button" class="btn-default btn-small inline open-AddBookDialog" style="position:relative;left:5%" data-toggle="modal" data-id="map"><span class="glyphicon glyphicon-map-marker"></span></button>
        </div>
    </div>
    <div class="box">
        <h4>Agentes</h4>
        <hr>
        <span class="titulo">Agente principal: </span><a id="agente_principal" href="?pagina=exibirUsuario&id=<?php echo $linhaOcorrencia['agente_principal']; ?>"><?php echo $linhaAgentePrincipal['nome']; ?></a><br>
        <?php if($linhaOcorrencia['agente_apoio_1']){ ?>
            <span class="titulo">Agente de apoio 1: </span><a id="agente_principal" href="?pagina=exibirUsuario&id=<?php echo $linhaOcorrencia['agente_apoio_1']; ?>"><?php echo $linhaAgente1['nome']; ?></a><br>
        <?php } if($linhaOcorrencia['agente_apoio_2']){ ?>
            <span class="titulo">Agente de apoio 2: </span><a id="agente_principal" href="?pagina=exibirUsuario&id=<?php echo $linhaOcorrencia['agente_apoio_2']; ?>"><?php echo $linhaAgente2['nome']; ?></a><br>
        <?php } ?>
        <br>
    </div>
    <div class="box">
        <h4>Ocorrencia</h4>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <span class="titulo">Data de lançamento: </span>
                <span id="data_lancamento">
                    <?php echo date("d/m/Y", strtotime($linhaOcorrencia['data_lancamento'])); ?>
                </span>
            </div>
            <div class="col-sm-6">
                <span class="titulo">Data de ocorrência: </span>
                <span id="data_ocorrencia">
                    <?php echo date("d/m/Y", strtotime($linhaOcorrencia['data_ocorrencia'])); ?>
                </span>
            </div>
        </div>
        <span class="titulo">Titulo: </span><span id="ocorr_titulo"><?php echo $linhaOcorrencia['ocorr_titulo']; ?></span><br>
        <span class="titulo">Origem: </span><span id="ocorr_origem"><?php echo $linhaOcorrencia['ocorr_origem']; ?></span><br>
        <span class="titulo">Descrição: </span><span id="ocorr_descricao" class="ocorr_descricao"><?php echo $linhaOcorrencia['ocorr_descricao']; ?></span><br>
        <br>
    </div>
    <div class="box">
        <h4>Atentidos</h4>
        <hr>
        <?php if(!$linhaOcorrencia['atendido_1'] && !$linhaOcorrencia['atendido_2']){ ?>
            <span class=titulo>Nenhuma pessoa foi cadastrada</span><br>
        <?php }else{ ?>
            <span class="titulo">Pessoa atendida 1: </span><a id="atendido_1" href="?pagina=exibirPessoa&id=<?php echo $linhaOcorrencia['atendido_1']; ?>"><?php echo $linhaPessoa1['nome']; ?></a><br>
            <?php if($linhaOcorrencia['atendido_2']){ ?>
                <span class="titulo">Pessoa atendida 2: </span><a id="atendido_2" href="?pagina=exibirPessoa&id=<?php echo $linhaOcorrencia['atendido_2']; ?>"><?php echo $linhaPessoa2['nome']; ?></a><br>
            <?php } 
        }?>
        <br>
    </div>
    <div class="box">
        <h4>Tipo</h4>
        <hr>
        <span class="titulo">Cobrade: </span><span id="ocorr_cobrade"><?php echo $linhaCobrade['subgrupo']; ?></span><br>
        <?php if($linhaCobrade['codigo']=='00000'){ ?>
            <span class="titulo">Cobrade descrição: </span><span id="cobrade_descricao"><?php echo $linhaOcorrencia['cobrade_descricao']; ?></span>
        <?php } ?>
        <span class="titulo">Possui fotos: </span><span id="fotos"><?php echo ($linhaOcorrencia['ocorr_fotos'] == t) ? 'Sim':'Não'; ?></span>
    </div>
    <div class="box">
        <h4>Status</h4>
        <hr>
        <span class="titulo">Prioridade: </span><span id="ocorr_prioridade"><?php echo $linhaOcorrencia['ocorr_prioridade']; ?></span>
        <span class="titulo">Analisado: </span><span id="ocorr_analisado"><?php echo ($linhaOcorrencia['ocorr_analisado'] == t) ? 'Sim':'Não'; ?></span>
        <span class="titulo">Congelado: </span><span id="ocorr_congelado"><?php echo ($linhaOcorrencia['ocorr_congelado']== t) ? 'Sim':'Não'; ?></span>
        <span class="titulo">Encerrado: </span><span id="ocorr_encerrado"><?php echo ($linhaOcorrencia['ocorr_encerrado']== t) ? 'Sim':'Não'; ?></span>
        <br><br>
    </div>
    <div class="box">
        <h4>Informações</h4>
        <hr>
        <span class="titulo">Ativa: </span><span id="ativa"><?php echo ($linhaOcorrencia['ativo']== t) ? 'Sim':'Não'; ?></span><br>
        <span class="titulo">Data de alteração: </span><span id="data_alteracao"><?php echo date("d/m/Y", strtotime($linhaOcorrencia['data_ocorrencia'])); ?></span><br>
        <span class="titulo">Usuário que realizou a alteração: </span><a id="usuario_criador" href="?pagina=exibirUsuario&id=<?php echo $linhaOcorrencia['usuario_criador']; ?>"><?php echo $linhaUsuarioCriador['nome']; ?></a><br>
        <span class="titulo">Ocorrência de referência: </span>
            <?php if($linhaOcorrencia['ocorr_referencia'] == null){ ?>
                <span id="ocorr_referencia"><?php echo 'Não possui'; ?></span><br>
            <?php }else{ ?>
                <a id="ocorr_referencia" href="?pagina=exibirOcorrencia&id=<?php echo $linhaOcorrencia['ocorr_referencia']; ?>"><?php echo $linhaOcorrencia['ocorr_referencia']; ?></a><br>
            <?php } ?>
        <br>
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
            </div>
        </div>
    </div>
    <?php if($linhaOcorrencia['ativo']== t){ ?>
        <form action="index.php?pagina=editarOcorrencia" method="post">
            <input name="id_ocorrencia" type="hidden" value="<?php echo $id_ocorrencia; ?>">
            <input name="chamado_id" type="hidden" value="<?php echo $linhaOcorrencia['chamado_id']; ?>">
            <input name="endereco_principal" type="hidden" value="<?php echo $linhaOcorrencia['ocorr_endereco_principal']; ?>">
            <input name="cep" type="hidden" value="<?php echo $linhaLogradouro['cep']; ?>">
            <input name="cidade" type="hidden" value="<?php echo $linhaLogradouro['cidade']; ?>">
            <input name="bairro" type="hidden" value="<?php echo $linhaLogradouro['bairro']; ?>">
            <input name="logradouro" type="hidden" value="<?php echo $linhaLogradouro['logradouro']; ?>">
            <input name="numero" type="hidden" value="<?php echo $linhaLogradouro['numero'] ?>">
            <input name="referencia" type="hidden" value="<?php echo $linhaLogradouro['referencia']; ?>">
            <input name="latitude" type="hidden" value="<?php echo $linhaOcorrencia['ocorr_coordenada_latitude']; ?>">
            <input name="longitude" type="hidden" value="<?php echo $linhaOcorrencia['ocorr_coordenada_longitude']; ?>">
            <input name="agente_principal" type="hidden" value="<?php echo $linhaAgentePrincipal['nome']; ?>">
            <input name="agente_apoio1" type="hidden" value="<?php echo $linhaAgente1['nome']; ?>">
            <input name="agente_apoio2" type="hidden" value="<?php echo $linhaAgente2['nome']; ?>">
            <input name="data_lancamento" type="hidden" value="<?php echo $linhaOcorrencia['data_lancamento']; ?>">
            <input name="data_ocorrencia" type="hidden" value="<?php echo $linhaOcorrencia['data_ocorrencia']; ?>">
            <input name="titulo" type="hidden" value="<?php echo $linhaOcorrencia['ocorr_titulo']; ?>">
            <input name="ocorr_descricao" type="hidden" value="<?php echo $linhaOcorrencia['ocorr_descricao']; ?>">
            <input name="ocorr_origem" type="hidden" value="<?php echo $linhaOcorrencia['ocorr_origem']; ?>">
            <input name="pessoa1" type="hidden" value="<?php echo $linhaPessoa1['nome']; ?>">
            <input name="pessoa2" type="hidden" value="<?php echo $linhaPessoa2['nome']; ?>">
            <input name="ocorr_cobrade" type="hidden" value="<?php echo $linhaCobrade['codigo']; ?>">
            <input name="cobrade_descricao" type="hidden" value="<?php echo $linhaOcorrencia['cobrade_descricao']; ?>">
            <input name="possui_foto" type="hidden" value="<?php echo $linhaOcorrencia['ocorr_fotos']; ?>">
            <input name="prioridade" type="hidden" value="<?php echo $linhaOcorrencia['ocorr_prioridade']; ?>">
            <input name="analisado" type="hidden" value="<?php echo $linhaOcorrencia['ocorr_analisado']; ?>">
            <input name="congelado" type="hidden" value="<?php echo $linhaOcorrencia['ocorr_congelado']; ?>">
            <input name="encerrado" type="hidden" value="<?php echo $linhaOcorrencia['ocorr_encerrado']; ?>">
            <input type="submit" class="btn btn-default btn-md" style="position:relative;left:25%;" value="Editar Ocorrencia">
        </form>
        <?php if(!$id_interdicao){ ?>
            <form action="index.php?pagina=cadastrarInterdicao" method="post">
                <input name="id_ocorrencia" type="hidden" value="<?php echo $id_ocorrencia; ?>">
                <input name="titulo_ocorrencia" type="hidden" value="<?php echo $linhaOcorrencia['ocorr_titulo']; ?>">
                <input name="endereco_principal" type="hidden" value="<?php echo $linhaOcorrencia['ocorr_endereco_principal']; ?>">
                <input name="cep" type="hidden" value="<?php echo $linhaLogradouro['cep']; ?>">
                <input name="cidade" type="hidden" value="<?php echo $linhaLogradouro['cidade']; ?>">
                <input name="bairro" type="hidden" value="<?php echo $linhaLogradouro['bairro']; ?>">
                <input name="logradouro" type="hidden" value="<?php echo $linhaLogradouro['logradouro']; ?>">
                <input name="numero" type="hidden" value="<?php echo $linhaLogradouro['numero'] ?>">
                <input name="referencia" type="hidden" value="<?php echo $linhaLogradouro['referencia']; ?>">
                <input name="latitude" type="hidden" value="<?php echo $linhaOcorrencia['ocorr_coordenada_latitude']; ?>">
                <input name="longitude" type="hidden" value="<?php echo $linhaOcorrencia['ocorr_coordenada_longitude']; ?>">
                <input type="submit" class="btn btn-default btn-md btn-interdicao-g" value="Gerar Interdição">
            </form>
        <?php }else{ ?>
            <a href="index.php?pagina=exibirInterdicao&id=<?php echo $id_interdicao; ?>" class="btn btn-default btn-md btn-interdicao">Verificar Interdição</a>
        <?php } ?>
    <?php } ?>
</div>
</div>