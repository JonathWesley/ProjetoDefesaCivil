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
?>

<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <div class="box">
        <p>Endereços<button id="editEnderecoBtn" class="glyphicon glyphicon-pencil btn btn-sm"></button></p>
        <nav>
            <span>Endereço principal: </span><span><?php echo $linhaOcorrencia['ocorr_endereco_principal']; ?></span>
        </nav>
        <?php if($linhaOcorrencia['ocorr_endereco_principal'] == "Logradouro"){ ?>
            <nav>
                <span>Logradouro: </span><span id="logradouro"><?php echo $linhaLogradouro['logradouro'];?></span>
            </nav>
            <nav>
                <span>Endereço numeral: </span><span id="numero" ><?php echo $linhaLogradouro['numero']; ?></span>
            </nav>
            <nav>
                <span>Endereço referência: </span><span id="referencia" ><?php echo $linhaLogradouro['referencia']; ?></span>
            </nav>
        <?php }else{ ?>
            <nav>
                <span>Latitude: </span><span id="latitude" ><?php echo $linhaOcorrencia['ocorr_coordenada_latitude']; ?></span>
            </nav>
            <nav>
                <span>Longitude: </span><span id="longitude" ><?php echo $linhaOcorrencia['ocorr_coordenada_longitude']; ?></span>
            </nav>
        <?php } ?>
    </div>

    <div class="box">
        <p>Agentes<button id="editAgentesBtn" class="glyphicon glyphicon-pencil btn btn-sm"></button></p>
        <nav>
            <span>Agente principal: </span><span id="agente_principal" ><?php echo $linhaAgentePrincipal['nome']; ?></span>
        </nav>
        <nav>
            <span>Agente de apoio 1: </span><span id="agente_apoio_1" ><?php echo $linhaAgente1['nome']; ?></span>
        </nav>
        <nav>
            <span>Agente de apoio 2: </span><span id="agente_apoio_2" ><?php echo $linhaAgente2['nome']; ?></span>
        </nav>
    </div>

    <div class="box">
        <p>Ocorrencia<button id="editOcorrenciaBtn" class="glyphicon glyphicon-pencil btn btn-sm"></button></p>
        <nav>
            <span>Ocorrência retorno: </span><span id="ocorr_retorno"><?php echo ($linhaOcorrencia['ocorr_retorno'] == t) ? 'Sim' : 'Não'; ?></span>
        </nav>
        <nav>
            <span>Código de referência: </span><span id="ocorr_referencia"><?php echo $linhaOcorrencia['ocorr_referencia']; ?></span>
        </nav>
        <nav>
            <span>Data de lançamento: </span><span id="data_lancamento" value="<?php echo $linhaOcorrencia['data_lancamento'];?>">
            <?php 
                $data = date("d-m-Y", strtotime($linhaOcorrencia['data_lancamento'])); 
                echo substr($data,0,2).'/'.substr($data,3,2).'/'.substr($data,-4);
            ?>
            </span>
        </nav>
        <nav>
            <span>Data de ocorrência: </span><span id="data_ocorrencia" value="<?php echo $linhaOcorrencia['data_ocorrencia']; ?>">
            <?php 
                $data = date("d-m-Y", strtotime($linhaOcorrencia['data_ocorrencia'])); 
                echo substr($data,0,2).'/'.substr($data,3,2).'/'.substr($data,-4);
            ?>
            </span>
        </nav>
        <nav>
            <span>Descrição: </span><span id="ocorr_descricao"><?php echo $linhaOcorrencia['ocorr_descricao']; ?></span>
        </nav>
        <nav>
            <span>Origem: </span><span id="ocorr_origem"><?php echo $linhaOcorrencia['ocorr_origem']; ?></span>
        </nav>
    </div>

    <div class="box">
        <p>Atentidos<button id="editAtendidosBtn" class="glyphicon glyphicon-pencil btn btn-sm"></button></p>
        <nav>
            <span>Pessoa atendida 1: </span><span id="atendido_1"><?php echo $linhaPessoa1['nome']; ?></span>
        </nav>
        <nav>
            <span>Pessoa atendida 2: </span><span id="atendido_2"><?php echo $linhaPessoa2['nome']; ?></span>
        </nav>
    </div>

    <div class="box">
        <p>Tipo<button id="editTipoBtn" class="glyphicon glyphicon-pencil btn btn-sm"></button></p>
        <nav>
            <span>Cobrade: </span><span id="ocorr_cobrade"><?php echo $linhaCobrade['subgrupo']; ?></span>
        </nav>
        <nav>
            <span>Natureza da ocorrência: </span><span id="ocorr_natureza"><?php echo $linhaOcorrencia['ocorr_natureza']; ?></span>
        </nav>
        <nav>
            <span>Possui fotos: </span><span id="fotos"><?php echo ($linhaOcorrencia['ocorr_fotos'] == t) ? 'Sim':'Não'; ?></span>
        </nav>
    </div>

    <div class="box">
        <p>Status<button id="editStatusEdit" class="glyphicon glyphicon-pencil btn btn-sm"></button></p>
        <nav>
            <span>Prioridade: </span><span id="ocorr_prioridade"><?php echo $linhaOcorrencia['ocorr_prioridade']; ?></span>
        </nav>
        <nav>
            <span>Analisado: </span><span id="ocorr_analisado"><?php echo ($linhaOcorrencia['ocorr_analisado'] == t) ? 'Sim':'Não'; ?></span>
        </nav>
        <nav>
            <span>Congelado: </span><span id="ocorr_congelado"><?php echo ($linhaOcorrencia['ocorr_congelado']== t) ? 'Sim':'Não'; ?></span>
        </nav>
        <nav>
            <span>Encerrado: </span><span id="ocorr_encerrado"><?php echo ($linhaOcorrencia['ocorr_encerrado']== t) ? 'Sim':'Não'; ?></span>
        </nav>
    </div>
</div>
</div>