<?php
    include 'database.php';

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

    $id_pessoa = $linhaChamado['pessoa_id'];
    $query = "SELECT nome FROM pessoa WHERE id_pessoa = $id_pessoa";
    $result = pg_query($connection, $query) or die(pg_last_error());
    $linhaPessoa = pg_fetch_array($result, 0);
?>

<div class="container positioning">
<div class="jumbotron campo_cadastro">
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
        <h4>Endereço</h4>
        <span class="titulo">Endereço principal: </span><span id="coordenada_principal" ng-model="sel_endereco" ng-init="sel_endereco='<?php echo $linhaChamado['endereco_principal']; ?>'"><?php echo $linhaChamado['endereco_principal']; ?></span>
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
        <h4>Atentido</h4>
        <nav>
            <span class="titulo">Pessoa atendida: </span><a id="atendido" href="?pagina=exibirPessoa&id=<?php echo $linhaChamado['pessoa_id'] ?>"><?php echo $linhaPessoa['nome']; ?></a>
        </nav>
    </div>
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
        <input name="pessoa_atendida_1" type="hidden" value="<?php echo $linhaPessoa['nome']; ?>">
        <input type="submit" class="btn btn-default btn-md" value="Gerar Ocorrência">
    </form>
</div>
</div>