<?php
include 'database.php';

$email = addslashes($_POST['email']);
$senha = $_POST['senha'];

$query = "SELECT * FROM dados_login WHERE email = '$email'";
$result = pg_query($connection, $query);

if(!$result){
    echo pg_last_error();
}else{
    if(pg_num_rows($result) == 1){
        $linha = pg_fetch_array($result, 0);
        $hash = $linha['senha'];
        if(crypt($senha, $hash) === $hash){
            session_start();
            $id = pg_fetch_array($result, 0)['id_usuario'];
            $_SESSION['id_usuario'] = $id;
            $consulta_login = pg_query($connection, "SELECT nivel_acesso FROM usuario WHERE id_usuario = $id");
            $_SESSION['nivel_acesso'] = pg_fetch_array($consulta_login, 0)['nivel_acesso'];
            $_SESSION['login'] = true;
            header('location:index.php?pagina=home');
        }else{
            header('location:index.php?erro');
        }
    }else{
        header('location:index.php?erro');
    }
}
