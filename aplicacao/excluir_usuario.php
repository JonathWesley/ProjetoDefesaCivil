<?php
    include 'database.php';

    $id_usuario = $_GET['id'];

    $query = "UPDATE dados_login SET ativo = false WHERE id_usuario = $id_usuario";
    $result = pg_query($connection, $query) or die (pg_last_error());

    if($result){
        header('location:index.php?pagina=consultarUsuario&sucesso');
    }else{
        header('location:index.php?pagina=exibirUsuario&id='.$id_usuario.'&errorDB');
    }