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
    <form method="post">
    <div class="box">
        <p>Endereços</p>
        <nav>
            Endereço principal: <span id="coordenada_principal" ng-model="sel_endereco" ng-init="sel_endereco='<?php echo $linhaOcorrencia['ocorr_endereco_principal']; ?>'"><?php echo $linhaOcorrencia['ocorr_endereco_principal']; ?></span>
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
                Latitude: <span id="latitude" ><?php echo $linhaOcorrencia['ocorr_coordenada_latitude']; ?></span>
            </nav>
            <nav>
                Longitude: <span id="longitude" ><?php echo $linhaOcorrencia['ocorr_coordenada_longitude']; ?></span>
            </nav>
        </div>
    </div>
    <div class="box">
        <p>Agentes</p>
        <nav>
            Agente principal: <span id="agente_principal" ><?php echo $linhaAgentePrincipal['nome']; ?></span>
        </nav>
        <nav>
            Agente de apoio 1: <span id="agente_apoio_1" ><?php echo $linhaAgente1['nome']; ?></span>
        </nav>
        <nav>
            Agente de apoio 2: <span id="agente_apoio_2" ><?php echo $linhaAgente2['nome']; ?></span>
        </nav>
    </div>
    <div class="box">
        <p>Ocorrencia</p>
        <nav>
            Ocorrência retorno: <span id="ocorr_retorno"><?php echo ($linhaOcorrencia['ocorr_retorno'] == t) ? 'Sim' : 'Não'; ?></span>
        </nav>
        <nav>
            Código de referência: <span id="ocorr_referencia"><?php echo $linhaOcorrencia['ocorr_referencia']; ?></span>
        </nav>
        <nav>
            Data de lançamento: <span id="data_lancamento" value="<?php echo $linhaOcorrencia['data_lancamento'];?>">
            <?php 
                $data = date("d-m-Y", strtotime($linhaOcorrencia['data_lancamento'])); 
                echo substr($data,0,2).'/'.substr($data,3,2).'/'.substr($data,-4);
            ?>
            </span>
        </nav>
        <nav>
            Data de ocorrência: <span id="data_ocorrencia" value="<?php echo $linhaOcorrencia['data_ocorrencia']; ?>">
            <?php 
                $data = date("d-m-Y", strtotime($linhaOcorrencia['data_ocorrencia'])); 
                echo substr($data,0,2).'/'.substr($data,3,2).'/'.substr($data,-4);
            ?>
            </span>
        </nav>
        <nav>
            Descrição: <span id="ocorr_descricao"><?php echo $linhaOcorrencia['ocorr_descricao']; ?></span>
        </nav>
        <nav>
            Origem: <span id="ocorr_origem"><?php echo $linhaOcorrencia['ocorr_origem']; ?></span>
        </nav>
    </div>

    <div class="box">
        <p>Atentidos</p>
        <nav>
            Pessoa atendida 1: <span id="atendido_1"><?php echo $linhaPessoa1['nome']; ?></span>
        </nav>
        <nav>
            Pessoa atendida 2: <span id="atendido_2"><?php echo $linhaPessoa2['nome']; ?></span>
        </nav>
    </div>

    <div class="box">
        <p>Tipo</p>
        <nav>
            Cobrade: <span id="ocorr_cobrade"><?php echo $linhaCobrade['subgrupo']; ?></span>
        </nav>
        <nav>
            Natureza da ocorrência: <span id="ocorr_natureza"><?php echo $linhaOcorrencia['ocorr_natureza']; ?></span>
        </nav>
        <nav>
            Possui fotos: <span id="fotos"><?php echo ($linhaOcorrencia['ocorr_fotos'] == t) ? 'Sim':'Não'; ?></span>
        </nav>
    </div>
    <div class="box">
        <p>Status</p>
        <nav>
            Prioridade: <span id="ocorr_prioridade"><?php echo $linhaOcorrencia['ocorr_prioridade']; ?></span>
        </nav>
        <nav>
            Analisado: <span id="ocorr_analisado"><?php echo ($linhaOcorrencia['ocorr_analisado'] == t) ? 'Sim':'Não'; ?></span>
        </nav>
        <nav>
            Congelado: <span id="ocorr_congelado"><?php echo ($linhaOcorrencia['ocorr_congelado']== t) ? 'Sim':'Não'; ?></span>
        </nav>
        <nav>
            Encerrado: <span id="ocorr_encerrado"><?php echo ($linhaOcorrencia['ocorr_encerrado']== t) ? 'Sim':'Não'; ?></span>
        </nav>
    </div>
        <button type="button" id="editOcorrencia" onclick="editarOcorrencia()" class="btn btn-default btn-md">Editar</button>
    </form>
    <script>
        //POST editar ocorrencia
        function editarOcorrencia(){
            var ocorr_prioridade = $("#ocorr_prioridade").html();
            $.redirect('view/editarOcorrencia.php', {'arg1': 'value1', 'arg2': 'value2'});
            alert(ocorr_prioridade);
        }
    </script>
</div>
</div>