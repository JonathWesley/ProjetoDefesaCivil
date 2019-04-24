<?php
include 'database.php';

$email = addslashes($_POST['email']);
$senha = $_POST['senha'];

$query = "SELECT senha FROM dados_login WHERE email = '$email'";
$result = pg_query($connection, $query);

if(!$result){
    echo pg_last_error();
}else{
    if(pg_num_rows($result) == 1){
        $linha = pg_fetch_array($result, 0);
        $hash = $linha['senha'];
        if(crypt($senha, $hash) === $hash){
            session_start();
            $_SESSION['id_usuario'] = pg_fetch_array($result, 0)['id_usuario'];
            $_SESSION['login'] = true;
            header('location:index.php');
        }else{
            header('location:index.php?erro');
        }
    }else{
        header('location:index.php?erro');
    }
}
