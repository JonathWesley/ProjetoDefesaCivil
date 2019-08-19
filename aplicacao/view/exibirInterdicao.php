<?php
    include 'database.php';

    $id_interdicao = $_GET['id'];

    $query = "SELECT interdicao.*,ocorrencia.id_ocorrencia,ocorrencia.ocorr_titulo,ocorrencia.ocorr_endereco_principal,
              ocorrencia.ocorr_coordenada_latitude,ocorrencia.ocorr_coordenada_longitude,endereco_logradouro.* 
              FROM interdicao 
              INNER JOIN ocorrencia ON (ocorrencia.id_ocorrencia=interdicao.id_ocorrencia) 
              INNER JOIN endereco_logradouro ON (ocorrencia.ocorr_logradouro_id=endereco_logradouro.id_logradouro) 
              WHERE id_interdicao=$id_interdicao";
    $result = pg_query($connection, $query) or die(pg_last_error());
    $linha = pg_fetch_array($result, 0);
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
            <h3 class="text-center">Registro de interdição</h3>
        </div>
    <div class="box">
        <nav>
        <h4>Dados ocorrência:</h4>
        </nav>
        <div class="row">
            <div class="col-sm-4"><span class="titulo">Nº ocorrência: </span><span><?php echo $linha['id_ocorrencia']; ?></span></div>
            <div class="col-sm-8"><span class="titulo">Título: </span><span><?php echo $linha['ocorr_titulo']; ?></span></div>
        </div><hr>
        <div>
            <span class="titulo">Endereço principal: </span><span ng-model="sel_endereco" ng-init="sel_endereco='<?php echo $linha['ocorr_endereco_principal']; ?>'"><?php echo $linha['ocorr_endereco_principal']; ?></span>
            <br>
        </div>
        <div ng-show="sel_endereco == 'Coordenada'">
            <div>
                <span class="titulo">Latitude: </span><span><?php echo $linha['latitude']; ?></span>
                <span class="titulo">Longitude: </span><span><?php echo $linha['longitude']; ?></span>
                <br>
                <button type="button" class="btn-default btn-small inline open-AddBookDialog" data-toggle="modal" data-id="map"><span class="glyphicon glyphicon-map-marker"></span></button>
            </div>
        </div>
        <div ng-show="sel_endereco == 'Logradouro'">
            <div class="row">
                <div class="col-sm-3"><span class="titulo">CEP: </span><span><?php echo $linha['cep']; ?></span></div>
                <div class="col-sm-6"><span class="titulo">Logradouro: </span><span><?php echo $linha['logradouro']; ?></span></div>
                <div class="col-sm-3"><span class="titulo">Número: </span><span><?php echo $linha['numero']; ?></span></div>
            </div>
            <div class="row">
                <div class="col-sm-3"><span class="titulo">Bairro: </span><span><?php echo $linha['bairro']; ?></span> </div>
                <div class="col-sm-6"><span class="titulo">Cidade: </span><span><?php echo $linha['cidade']; ?></span></div>
            </div>
            <div>
                <span class="titulo">Referência: </span><span><?php echo $linha['referencia']; ?></span>
            </div><br>
        </div>
    </div>
    <div class="box">
        <nav>
            <h4>Dados interdição:</h4>
        </nav>
        <div>
            <span class="titulo">Nº interdição: </span><span><?php echo $linha['id_interdicao']; ?></span>
        </div><hr>
        <div>
            <span class="titulo">Data e hora: </span>
            <span><?php echo date("d/m/Y H:i", strtotime($linha['data_hora'])); ?></span><br>
            <span class="titulo">Motivo: </span><span><?php echo $linha['motivo']; ?></span><br>
            <span class="titulo">Descrição da interdição: </span><br>
            <textarea name="descricao" rows="5" readonly class="readtextarea"><?php echo $linha['descricao_interdicao']; ?></textarea><br>
            <span class="titulo">Danos aparentes: </span><br>
            <textarea name="descricao" rows="5" readonly class="readtextarea"><?php echo $linha['danos_aparentes']; ?></textarea><br>
            <span class="titulo">Bens afetados: </span><span><?php echo $linha['bens_afetados']; ?></span><br>
            <span class="titulo">Tipo de interdição: </span><span><?php echo $linha['tipo']; ?></span><br>
        </div><hr>
        <div>
            <span class="titulo">Status: </span><span><?php echo ($linha['interdicao_ativa'] == t) ? 'Interditado':'Desisterditado'; ?></span>
        </div>
        <br>
    </div>
    <?php if($linha['interdicao_ativa'] == t){ ?>
        <form action="desinterdicao.php" method="post">
            <input type="hidden" name="id_ocorrencia" value="<?php echo $linha['id_ocorrencia']; ?>">
            <input type="hidden" name="id_interdicao" value="<?php echo $linha['id_interdicao']; ?>">
            <input type="submit" class="btn btn-default btn-md btn-interdicao-g" value="Constatar Desinterdição">
        </form>
    <?php } ?>
</div>
</div>
