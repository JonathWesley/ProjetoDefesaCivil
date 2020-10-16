<?php
    include 'database.php';

    session_start();

    $id_chamado = $_GET['id'];

    $query = "SELECT * FROM chamado WHERE id_chamado = $id_chamado";
    $result = pg_query($connection, $query) or die(pg_last_error());
    $linhaChamado = pg_fetch_array($result, 0);

    if($linhaChamado['endereco_principal'] == "Logradouro"){
        $id_logradouro = $linhaChamado['chamado_logradouro_id'];
        $query = "SELECT * FROM endereco_logradouro WHERE id_logradouro = $id_logradouro";
        $result = pg_query($connection, $query) or die(pg_last_error());
        $linhaLogradouro = pg_fetch_array($result, 0);
    }

    //$id_pessoa = $linhaChamado['pessoa_id'];
    //if($id_pessoa != ""){
    //    $query = "SELECT nome FROM pessoa WHERE id_pessoa = $id_pessoa";
    //    $result = pg_query($connection, $query) or die(pg_last_error());
    //    $linhaPessoa = pg_fetch_array($result, 0);
    //}

    $id_agente = $linhaChamado['agente_id'];
    if($id_agente != ""){
        $query = "SELECT nome FROM usuario WHERE id_usuario = $id_agente";
        $result = pg_query($connection, $query) or die(pg_last_error());
        $linhaAgente = pg_fetch_array($result, 0);
    }

    $id_distribuicao = $linhaChamado['distribuicao'];
    if($id_distribuicao != ""){
        $query = "SELECT nome FROM usuario WHERE id_usuario = $id_distribuicao";
        $result = pg_query($connection, $query) or die(pg_last_error());
        $linhaDistribuicao = pg_fetch_array($result, 0);
    }
?>

<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <div class="box">
        <div class="row cabecalho">
            <div class="col-sm-6">
                <nav class="texto-cabecalho">Estado de Santa Catarina</nav>
                <nav class="texto-cabecalho">Prefeitura de Balneário Camboriú</nav>
                <nav class="texto-cabecalho">Secretaria de segurança</nav>
                <nav class="texto-cabecalho">Defesa Civil</nav>
            </div>
            <div class="col-sm-6">
                <img src="images/balneario-camboriu.png" alt="prefeitura-balneario-camboriu" class="img-cabecalho">
            </div>
        </div>
        <h3 class="text-center">Registro de chamado</h3>
    <hr>
        <h4>Endereço</h4>
        <span class="titulo hide">Endereço principal: </span><span class="hide" id="coordenada_principal" ng-model="sel_endereco" ng-init="sel_endereco='<?php echo $linhaChamado['endereco_principal']; ?>'"><?php echo $linhaChamado['endereco_principal']; ?></span>
        <div ng-show="sel_endereco == 'Logradouro'">
            <div class="row">
                <div class="col-sm-3"><span class="titulo">CEP: </span><?php echo $linhaLogradouro['cep']; ?></div>
                <div class="col-sm-6"><span class="titulo">Logradouro: </span><?php echo $linhaLogradouro['logradouro']; ?></div>
                <div class="col-sm-3"><span class="titulo">Número: </span><?php echo $linhaLogradouro['numero']; ?></div>
            </div>
            <div class="row">
                <div class="col-sm-6"><span class="titulo">Bairro: </span><?php echo $linhaLogradouro['bairro']; ?></div>
                <div class="col-sm-6"><span class="titulo">Cidade: </span><?php echo $linhaLogradouro['cidade']; ?></div>
            </div>
            <nav><span class="titulo">Referência: </span><?php echo $linhaLogradouro['referencia']; ?></nav><br>
        </div>
        <div ng-show="sel_endereco == 'Coordenada'">
            <nav>
                <span class="titulo">Latitude: </span><span id="latitude" ><?php echo $linhaChamado['latitude']; ?></span>
            </nav>
            <nav class="inline">
                <span class="titulo">Longitude: </span><span id="longitude" ><?php echo $linhaChamado['longitude']; ?></span>
            </nav>
            <button type="button" class="btn-default btn-small inline open-AddBookDialog" style="position:relative;left:5%" data-toggle="modal" data-id="map"><span class="glyphicon glyphicon-map-marker"></span></button>
        </div>
    <hr>
        <h4>Ocorrencia</h4>
        <nav>
            <span class="titulo">Data e hora: </span>
            <span><?php echo date("d/m/Y H:i", strtotime($linhaChamado['data_hora'])); ?></span><br>
            <span class="titulo">Origem: </span><span id="ocorr_origem"><?php echo $linhaChamado['origem']; ?></span><br>
            <span class="titulo">Descrição: </span><br>
            <textarea name="descricao" rows="5" readonly class="readtextarea"><?php echo $linhaChamado['descricao']; ?></textarea><br>
        </nav>
    <hr>
        <h4>Solicitante</h4>
        <nav>
            <?php if($linhaChamado['nome_pessoa'] != ""){ ?>
            <span class="titulo">Pessoa atendida: </span><span><?php echo $linhaChamado['nome_pessoa']; ?></span>
            <!--<a id="atendido" href="?pagina=exibirPessoa&id=<?php //echo $linhaChamado['pessoa_id']; ?>"><?php //echo $linhaPessoa['nome']; ?></a>-->
            <?php }else{ ?>
            <span>Nenhuma pessoa cadastrada.</span>
            <?php } ?>
        </nav>
    <hr>
        <h4>Distribuído para</h4>
        <nav>
            <?php if($linhaChamado['distribuicao'] != NULL){ ?>
            <a id="distribuicao" href="?pagina=exibirUsuario&id=<?php echo $linhaChamado['distribuicao']; ?>"><?php echo $linhaDistribuicao['nome']; ?></a>
            <?php }else{ ?>
            <span>Nenhuma distribuição cadastrada.</span>
            <?php } ?>
        </nav>
    </div>
    <div class="row">
    <div class="col-sm-6">
        <?php if($linhaChamado['usado'] == 'f' && ($_SESSION['nivel_acesso'] == 1 || $_SESSION['nivel_acesso'] == 2)){ ?>
        <form action="cancelarChamado.php" method="post">
            <!--<input name="id_chamado" type="hidden" value="<?php //echo $id_chamado; ?>">
            <input type="submit" class="btn btn-default btn-md" value="Cancelar chamado">-->
            <button type="button" class="btn btn-default btn-md open-AddBookDialog" data-toggle="modal" data-id="motivo">Cancelar</button>
        </form>
        <?php } ?>
    </div>
    <div class="col-sm-3">
        <?php if($linhaChamado['usado'] == 'f'){ ?>
            <form action="index.php?pagina=cadastrarOcorrencia" method="post">
                <input name="id_chamado" type="hidden" value="<?php echo $id_chamado; ?>">
                <input name="endereco_principal" type="hidden" value="<?php echo $linhaChamado['endereco_principal']; ?>">
                <input name="cep" type="hidden" value="<?php echo $linhaLogradouro['cep']; ?>">
                <input name="cidade" type="hidden" value="<?php echo $linhaLogradouro['cidade']; ?>">
                <input name="bairro" type="hidden" value="<?php echo $linhaLogradouro['bairro']; ?>">
                <input name="logradouro" type="hidden" value="<?php echo $linhaLogradouro['logradouro']; ?>">
                <input name="numero" type="hidden" value="<?php echo $linhaLogradouro['numero'] ?>">
                <input name="referencia" type="hidden" value="<?php echo $linhaLogradouro['referencia']; ?>">
                <input name="latitude" type="hidden" value="<?php echo $linhaChamado['latitude']; ?>">
                <input name="longitude" type="hidden" value="<?php echo $linhaChamado['longitude']; ?>">
                <input name="data_ocorrencia" type="hidden" value="<?php echo date("Y-m-d", strtotime($linhaChamado['data_hora'])); ?>">
                <input name="descricao" type="hidden" value="<?php echo $linhaChamado['descricao']; ?>">
                <input name="ocorr_origem" type="hidden" value="<?php echo $linhaChamado['origem']; ?>">
                <input name="pessoa_atendida_1" type="hidden" value="<?php echo $$linhaChamado['nome_pessoa']; ?>">
                <input name="agente_principal" type="hidden" value="<?php echo $linhaAgente['nome']; ?>">
                <input type="submit" class="btn btn-default btn-md" value="Gerar Ocorrência">
            </form>
        <?php } ?>
    </div>
    </div>
    <div class="modal fade" id="cancelarModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Cancelar chamado</h5>
                </div>
                <form action="cancelarChamado.php" method="post">
                    <div class="modal-body">
                        <nav>
                            <div class="row">
                                <div class="col-sm-12">
                                    Motivo: <span style="color:red;">*</span>
                                    <textarea id="motivo" name="motivo" class="form-control" cols="10" rows="3" maxlength="255" required></textarea>
                                    <input name="id_chamado" type="hidden" value="<?php echo $id_chamado; ?>">
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="modal-footer">
                        <button>Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>