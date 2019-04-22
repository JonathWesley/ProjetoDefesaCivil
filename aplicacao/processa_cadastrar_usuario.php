<?php
include 'database.php';

$nome = addslashes($_POST['nome']);
$cpf = addslashes($_POST['cpf']);
$telefone = addslashes($_POST['telefone']);
$nivel_acesso = addslashes($_POST['nivel_acesso']);
$email = addslashes($_POST['email_cadastro']);
$senha = addslashes($_POST['senha_cadastro']);
$senha_confirma = addslashes($_POST['senha_cadastro_confirma']);

$custo = '08';
$salt = 'Cf1f11ePArKlBJomM0F6aJ';
$hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');

$result = pg_query($connection, "INSERT INTO dados_login (email, senha) VALUES ('$email', '$hash')");
if(!$result)
	echo 'Erro: '.pg_last_error();

$result = pg_query($connection, "SELECT * FROM dados_login WHERE email = '$email'");
if(!$result)
	echo 'Erro: '.pg_last_error();

$linha = pg_fetch_array($result, 0);
$id = $linha['id_usuario'];
$acesso;
if($nivel_acesso == 'Administrador'){
    $acesso = 1;
}else if($nivel_acesso == 'Usuário 1'){
    $acesso = 2;
}else{
    $acesso = 3;
}

$result = pg_query($connection, "INSERT INTO usuario 
					(id_usuario, nome, cpf, telefone, nivel_acesso) 
					VALUES ($id, '$nome', '$cpf', '$telefone', $acesso)");
if(!$result)
	echo 'Erro: '.pg_last_error();
else
	header('location:index.php');