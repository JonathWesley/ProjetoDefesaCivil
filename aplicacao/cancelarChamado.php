<?php
//inclui a conexao com o banco de dados
include 'database.php';

//recebe dados do $_POST
$id_chamado = addslashes($_POST['id_chamado']);
$motivo = addslashes($_POST['motivo']);

$erros='';

session_start();
$id_usuario = $_SESSION['id_usuario'];
$dataAtual = date('Y-m-d H:i:s');

$query = "UPDATE chamado SET usado = TRUE, cancelado = TRUE, motivo = '$motivo' WHERE id_chamado = $id_chamado";

$result = pg_query($connection, $query);
	
if($result){
    $query = "INSERT INTO log_chamado (id_usuario, id_chamado, data_hora, acao)
				VALUES ($id_usuario,$id_chamado,'$dataAtual','cancelar')";

	$result = pg_query($connection, $query) or die(pg_last_error());
		
	header('location:index.php?pagina=consultarChamado&sucesso');
}else{
	//echo pg_last_error();
	header('location:index.php?pagina=consultarChamado&erroDB');
}
