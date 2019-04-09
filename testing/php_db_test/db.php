<?php

$connection = pg_connect("host=localhost dbname=dbTeste user=testuser password=123");

$result_curso = pg_query($connection, "SELECT * FROM curso");

$result_aluno = pg_query($connection, "SELECT * FROM aluno");
 
$result_aluno_curso = pg_query($connection, 
"SELECT aluno_curso.id_aluno_curso, aluno.nome_aluno, curso.nome_curso 
FROM aluno, curso, aluno_curso 
WHERE aluno_curso.id_aluno = aluno.id_aluno
AND aluno_curso.id_curso = curso.id_curso");
