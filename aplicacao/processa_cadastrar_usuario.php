<?php
include 'database.php';

$nome = addslashes($_POST['nome']);
$cpf = addslashes($_POST['cpf']);
$telefone = addslashes($_POST['telefone']);
$nivel_acesso = addslashes($_POST['nivel_acesso']);
$email = addslashes($_POST['email_cadastro']);
$senha = addslashes($_POST['senha_cadastro']);
$senha_confirma = addslashes($_POST['senha_cadastro_confirma']);

$senha = md5($senha);

$result = pg_query("INSERT INTO log_in (email, senha) VALUES ('$email', '$senha')");
if(!$result)
	echo 'Erro: '.pg_last_error();

$result = pg_query("SELECT * FROM log_in WHERE email = '$email'");
if(!$result)
	echo 'Erro: '.pg_last_error();

$linha = pg_fetch_array($result, 0);
$id = $linha['id'];
$acesso;
if($nivel_acesso == 'Administrador'){
    $acesso = 1;
}else if($nivel_acesso == 'Usuário 1'){
    $acesso = 2;
}else{
    $acesso = 3;
}

$result = pg_query($connection, 
"INSERT INTO usuario (id, nome, cpf, telefone, nivel_acesso) VALUES ($id, '$nome', '$cpf', '$telefone', $acesso)");
if(!$result)
	echo 'Erro: '.pg_last_error();
else
	header('location:index.php');