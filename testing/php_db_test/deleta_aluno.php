<?php

include 'db.php';

$id_aluno = $_GET['id_aluno'];

$query = "DELETE FROM aluno WHERE id_aluno = $id_aluno";

$success = pg_query($connection, $query);

if($success){
    header('location:index.php?pagina=alunos');
}else{
    echo 'Falha na conexão'.pg_last_error();
}