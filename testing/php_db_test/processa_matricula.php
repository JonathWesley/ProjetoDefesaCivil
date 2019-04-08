<?php

include 'db.php';

$id_aluno = $_POST['escolha_aluno'];
$id_curso = $_POST['escolha_curso'];

$query = "INSERT INTO aluno_curso(id_aluno, id_curso) VALUES ($id_aluno, $id_curso)";

$success = pg_query($connection, $query);

if($success){
    header('location:index.php?pagina=matriculas');
}else{
    echo 'Falha na conexão'.pg_last_error();
}