<?php

include 'db.php';

$id_curso = $_GET['id_curso'];

$query = "DELETE FROM curso WHERE id_curso = $id_curso";

$success = pg_query($connection, $query);

if($success){
    header('location:index.php?pagina=cursos');
}else{
    echo 'Falha na conexão'.pg_last_error();
}
