<?php 

include 'db.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$query = "SELECT * FROM usuario WHERE usuario = '$usuario' AND senha = '$senha'";

$success = pg_query($connection, $query);

if(pg_num_rows($success) == 1){
    $_SESSION['login'] = true;
    header('location:index.php');
}else{
    header('location:index.php?erro');
}

/*if($success){
    header('location:index.php?pagina=alunos');
}else{
    echo 'Falha na conexão'.pg_last_error();
}*/
