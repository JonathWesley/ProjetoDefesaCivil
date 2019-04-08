<?php

include 'db.php';

$nome_aluno = $_POST['nome_aluno'];
$idade = $_POST['idade'];

$query = "INSERT INTO aluno(nome_aluno, idade) VALUES ('$nome_aluno', $idade)";

$success = pg_query($connection, $query);

if($success){
    header('location:index.php?pagina=alunos');
}else{
    echo 'Falha na conexão'.pg_last_error();
}
