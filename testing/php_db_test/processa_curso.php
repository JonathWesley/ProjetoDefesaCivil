<?php

include 'db.php';

$nome_curso = $_POST['nome_curso'];
$carga_horaria = $_POST['carga_horaria'];

$query = "INSERT INTO curso(nome_curso, carga_horaria) VALUES('$nome_curso', $carga_horaria)";

pg_query($result, $query);

echo pg_last_error();