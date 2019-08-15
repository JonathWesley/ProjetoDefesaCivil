<?php
    //inclui a conexao com o banco de dados
    include 'database.php';

    //recebe dados do $_POST
    $id_ocorrencia = addslashes($_POST['id_ocorrencia']);
    $data = addslashes($_POST['data']);
    $hora = addslashes($_POST['horario']);
    $motivo = addslashes($_POST['motivo']);
    $descricao_interdicao = addslashes($_POST['descricao_interdicao']);
    $danos_aparentes = addslashes($_POST['danos_aparentes']);
    $bens_afetados = addslashes($_POST['bens_afetados']);
    $tipo = addslashes($_POST['tipo']);

    session_start();
    $id_usuario = $_SESSION['id_usuario'];
    $dataAtual = date('Y-m-d H:i:s');

    $timestamp = $data.' '.$hora.':00';

    $query = "INSERT INTO interdicao (data_hora, id_ocorrencia, motivo, descricao_interdicao, danos_aparentes, bens_afetados, tipo) 
              VALUES ('$timestamp', $id_ocorrencia, '$motivo', '$descricao_interdicao', '$danos_aparentes', '$bens_afetados', '$tipo')";

    $result = pg_query($connection, $query);
        
    if($result){
        header('location:index.php?pagina=cadastrarChamado&sucesso');
    }else{
        //echo pg_last_error();
        header('location:index.php?pagina=cadastrarChamado&erroDB');
    }
