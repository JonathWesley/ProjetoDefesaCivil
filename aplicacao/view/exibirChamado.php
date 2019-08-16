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
    </div>
    <div class="box">
        <p>Endereço</p>
        <nav>
            Endereço principal: <span id="coordenada_principal" ng-model="sel_endereco" ng-init="sel_endereco='<?php echo $linhaChamado['endereco_principal']; ?>'"><?php echo $linhaChamado['endereco_principal']; ?></span>
        </nav>
        <div ng-show="sel_endereco == 'Logradouro'">
            <nav>
                Logradouro: <span id="logradouro"><?php echo $linhaLogradouro['logradouro'];?></span>
            </nav>
            <nav>
                Endereço numeral: <span id="numero" ><?php echo $linhaLogradouro['numero']; ?></span>
            </nav>
            <nav>
                Endereço referência: <span id="referencia" ><?php echo $linhaLogradouro['referencia']; ?></span>
            </nav>
        </div>
        <div ng-show="sel_endereco == 'Coordenada'">
            <nav>
                Latitude: <span id="latitude" ><?php echo $linhaChamado['latitude']; ?></span>
            </nav>
            <nav>
                Longitude: <span id="longitude" ><?php echo $linhaChamado['longitude']; ?></span>
            </nav>
        </div>
    </div>
    <div class="box">
        <p>Ocorrencia</p>
        <nav>
            Data e Hora: <span id="data" value="<?php echo $linhaChamado['data_hora'];?>">
            <?php echo date("d/m/Y H:i", strtotime($linhaChamado['data_hora'])); ?>
            </span>
        </nav>
        <nav>
            Origem: <span id="ocorr_origem"><?php echo $linhaChamado['origem']; ?></span>
        </nav>
        <nav>
            Descrição: <span id="ocorr_descricao"><?php echo $linhaChamado['descricao']; ?></span>
        </nav>
    </div>
    <div class="box">
        <p>Atentido</p>
        <nav>
            Pessoa atendida: <span id="atendido"><?php echo $linhaPessoa['nome']; ?></span>
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