<?php
session_start();
$host = 'localhost';
$dbname = 'defesa_civil';
$user = 'df_user';
$password = 'qwe';

$connection = pg_connect("host=$host dbname=$dbname user=$user password=$password");

$id = (int)$_SESSION['id_usuario'];
$consulta_login = pg_query($connection, "SELECT * FROM usuario WHERE id_usuario = $id");