<?php

include 'database.php';

$email = addslashes($_POST['email']);
$senha = md5($_POST['senha']);

$query = "SELECT * FROM log_in WHERE email = '$email' AND senha = '$senha'";

$result = pg_query($connection, $query);

if(!$result){
    echo pg_last_error();
}else{
    if(pg_num_rows($result) == 1){
        session_start();
        $_SESSION['login'] = true;
        header('location:index.php');
    }else{
        header('location:index.php?erro');
    }
}
