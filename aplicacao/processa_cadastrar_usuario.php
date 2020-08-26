<?php
include 'database.php';

$nome = addslashes($_POST['nome']);
$cpf = addslashes($_POST['cpf']);
$telefone = addslashes($_POST['telefone']);
$nivel_acesso = addslashes($_POST['nivel_acesso']);
$email = addslashes($_POST['email_cadastro']);
$senha = ($_POST['senha_cadastro']);
$senha_confirma = ($_POST['senha_cadastro_confirma']);
$foto = $_FILES["foto"]["tmp_name"];

$binary = file_get_contents($foto);
$base64 = base64_encode($binary);
	
$custo = '08';
$string = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$salt = '';
for ($i = 0; $i < 22; $i++){
	$salt = $salt.$string[rand(0,61)];
}
$salt = str_shuffle($salt);
$hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');

$result = pg_query($connection, "INSERT INTO dados_login (email, senha) VALUES ('$email', '$hash') RETURNING id_usuario");

$id = pg_fetch_array($result, 0)['id_usuario'];

$acesso;
if($nivel_acesso == 'Diretor'){
	$acesso = 1;
}else if($nivel_acesso == 'Coordenador'){
	$acesso = 2;
}else if($nivel_acesso == 'Agente'){
	$acesso = 3;
}else{
	$acesso = 4;
}

session_start();
$id_criador = $_SESSION['id_usuario'];
$data = date('Y-m-d H:i:s');

$query = "BEGIN; 
		  INSERT INTO usuario (id_usuario, nome, cpf, telefone, nivel_acesso, foto) 
		  VALUES ($id, '$nome', '$cpf', '$telefone', '$acesso', '$base64');
		  INSERT INTO log_alteracao_usuario (id_usuario_modificador, id_usuario_alterado, data_hora, acao) 
		  VALUES ($id_criador, $id, '$data', 'cadastrar');
		  COMMIT;";
$result = pg_query($connection, $query);
if(!$result){
	//header('location:index.php?pagina=cadastrarUsuario&erroDB');
	echo $base64.'<br>';
	echo pg_last_error();
}else
	header('location:index.php?pagina=cadastrarUsuario&sucesso');
