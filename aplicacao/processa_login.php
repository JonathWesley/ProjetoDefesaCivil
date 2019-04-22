<?php
include 'database.php';

$email = addslashes($_POST['email']);
$senha = $_POST['senha'];

$custo = '08';
$salt = 'Cf1f11ePArKlBJomM0F6aJ';
$hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');

$query = "SELECT * FROM dados_login WHERE email = '$email' AND senha = '$hash'";
$result = pg_query($connection, $query);

if(!$result){
    echo pg_last_error();
}else{
    if(pg_num_rows($result) == 1){
        session_start();
        $_SESSION['id_usuario'] = pg_fetch_array($result, 0)['id_usuario'];
        $_SESSION['login'] = true;
        header('location:index.php');
    }else{
        header('location:index.php?erro');
    }
}
