<?php

include 'db.php';

$id_aluno_curso = $_GET['id_aluno_curso'];

$query = "DELETE FROM aluno_curso WHERE id_aluno_curso = $id_aluno_curso";

$success = pg_query($connection, $query);

if($success){
    header('location:index.php?pagina=matriculas');
}else{
    echo 'Falha na conexão'.pg_last_error();
}