<?php
    include 'database.php';

    $query = "SELECT * FROM chamado WHERE usado = FALSE LIMIT 5";
    $consultaChamado = pg_query($connection, $query) or die(pg_last_error());

    $response = "";
    $i = 0;
    while($linhaChamado = pg_fetch_array($consultaChamado, $i)){
        if($linhaChamado['endereco_principal'] == "Logradouro"){
            $id_logradouro = $linhaChamado['chamado_logradouro_id'];
            $query = "SELECT * FROM endereco_logradouro WHERE id_logradouro = $id_logradouro";
            $result = pg_query($connection, $query) or die(pg_last_error());
            $linhaLogradouro = pg_fetch_array($result, 0);
        }

        $id_pessoa = $linhaChamado['pessoa_id'];
        $nomePessoa = "Não cadastrada.";
        if($id_pessoa != NULL){
            $query = "SELECT nome FROM pessoa WHERE id_pessoa = $id_pessoa";
            $result = pg_query($connection, $query) or die(pg_last_error());
            $linhaPessoa = pg_fetch_array($result, 0);
            $nomePessoa = $linhaPessoa['nome'];
        }

        $id_agente = $linhaChamado['agente_id'];
        $query = "SELECT nome FROM usuario WHERE id_usuario = $id_agente";
        $result = pg_query($connection, $query) or die(pg_last_error());
        $linhaAgente = pg_fetch_array($result, 0);

        $color = '#88ff50';
        if($linhaChamado['prioridade'] == "Alta"){
            $color = '#ff5050';
        }else if($linhaChamado['prioridade'] == "Média"){
            $color = '#fff050';
        }

        $response = $response.'<tr style="background-color:'.$color.';"><td>'.$linhaChamado['id_chamado'].'</td>';
        $response = $response.'<td>'.$linhaChamado['data_hora'].'</td>';
        $response = $response.'<td>'.$linhaChamado['origem'].'</td>';
        $response = $response.'<td>'.$nomePessoa.'</td>';
        $response = $response.'<td>'.$linhaAgente['nome'].'</td>';
        $response = $response.'<td>'.$linhaChamado['distribuicao'].'</td>';
        $response = $response.'<td>'.$linhaLogradouro['logradouro'].'</td>';
        $response = $response.'<td>'.$linhaChamado['descricao'].'</td></tr>';
    
        $i += 1;
    }

    if($response == ""){
        $response = $response.'<tr><td colspan="6" class="text-center">Nenhum Chamado</td></tr>';
    }

    //output the response
    echo $response;
?>