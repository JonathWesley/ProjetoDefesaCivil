<?php
    include 'database.php';
    session_start();

    $id_usuario_modificador = $_SESSION['id_usuario'];
    $id_usuario_alterado = $_POST['id'];
    $data = date('Y-m-d H:i:s');

    if($_SESSION['nivel_acesso'] == 1){
        $query = "BEGIN; 
                  UPDATE dados_login SET ativo = false WHERE id_usuario = $id_usuario_alterado;
                  INSERT INTO log_alteracao_usuario (id_usuario_modificador, id_usuario_alterado, data_hora, acao)
                  VALUES ($id_usuario_modificador, $id_usuario_alterado, '$data', 'excluir');
                  COMMIT;";
        $result = pg_query($connection, $query) or die (pg_last_error());
    
        if($result)
            header('location:index.php?pagina=consultarUsuario&sucesso');
        else
            header('location:index.php?pagina=exibirUsuario&id='.$id_usuario.'&errorDB');
    }
    