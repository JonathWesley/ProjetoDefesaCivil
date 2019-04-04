<?php

$connection = pg_connect("host=localhost dbname=dbTeste user=testuser password=123");

$query = "SELECT * FROM curso";
$result_curso = pg_query($connection, $query);

$query = "SELECT * FROM aluno";
$result_aluno = pg_query($connection, $query);

$query = "SELECT aluno.nome_aluno, curso.nome_curso 
            FROM aluno, curso, aluno_curso 
            WHERE aluno_curso.id_aluno = aluno.id_aluno
            AND aluno_curso.id_curso = curso.id_curso";
$result_aluno_curso = pg_query($connection, $query);