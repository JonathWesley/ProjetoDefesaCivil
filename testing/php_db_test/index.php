<?php

$db_connection = pg_connect("host=localhost dbname=dbTeste user=testuser password=123");

echo 'testando: ';

if(!$db_connection){
    echo 'nao foi!';
}else{
    echo 'foi';
}

$result = pg_query($db_connection, "SELECT * FROM aluno WHERE id_aluno=1");

if(!$result){
    echo ', nao foi!' . pg_last_error();
}else{
    echo ', foi';
}

$row = pg_fetch_row($result);

if($row[0] == null){
    echo '<br/>usuario nao encontrado';
}else{
    echo '<br/>id: '.$row[0].' - nome: '.$row[1].' - data_nascimento: '.$row[2];
}