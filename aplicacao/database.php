<?php
session_start();
$connection = pg_connect("host=localhost dbname=defesa_civil_db user=df_user password=qwe");

$id = (int)$_SESSION['id_usuario'];
$consulta_login = pg_query($connection, "SELECT * FROM usuario WHERE usuario.id = $id");

$consulta_usuarios = pg_query($connection, "SELECT * FROM usuario");

$consulta_ocorrencias = pg_query($connection, "SELECT * FROM ocorrencia");

