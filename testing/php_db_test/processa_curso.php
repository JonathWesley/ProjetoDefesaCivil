<?php

include 'db.php';

$nome_curso = $_POST['nome_curso'];
$carga_horaria = $_POST['carga_horaria'];

$query = "INSERT INTO curso(nome_curso, carga_horaria) VALUES('$nome_curso', '$carga_horaria')";

$success = pg_query($connection, $query);

if($success){
    header('location:index.php?pagina=cursos');
}else{
    echo 'Falha na conexão'.pg_last_error();
};

