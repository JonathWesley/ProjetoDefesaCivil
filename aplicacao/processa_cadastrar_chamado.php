<?php
//inclui a conexao com o banco de dados
include 'database.php';

//recebe dados do $_POST
$data = addslashes($_POST['data_chamado']);
$hora = addslashes($_POST['horario_chamado']);
$origem = addslashes($_POST['origem_chamado']);
$nome = addslashes($_POST['nome_chamado']);
$telefone = addslashes($_POST['telefone_chamado']);
$endereco_principal = addslashes($_POST['endereco_principal']);
$longitude = addslashes($_POST['longitude']);
$latitude = addslashes($_POST['latitude']);
$cep = addslashes($_POST['cep']);
$cidade = addslashes($_POST['cidade']);
$bairro = addslashes($_POST['bairro']);
$logradouro = addslashes($_POST['logradouro']);
$numero = addslashes($_POST['complemento']);
$referencia = addslashes($_POST['referencia']);
$descricao = addslashes($_POST['descricao_chamado']);

$erros='';

$logradouro_id = 'null';
if($endereco_principal == "Logradouro"){
	$cep = str_replace("-","",$cep);
	$result = pg_query($connection, "SELECT * FROM endereco_logradouro
									WHERE logradouro = '$logradouro' AND numero = '$numero'");
	if(pg_num_rows($result) == 0){
		$result = pg_query($connection, "INSERT INTO endereco_logradouro(cep,cidade,bairro,logradouro,numero,referencia)
										VALUES ('$cep','$cidade','$bairro','$logradouro','$numero','$referencia')");
		if(!$result)
			$erros = $erros.'&logradouro';
		$result = pg_query($connection, "SELECT * FROM endereco_logradouro
										WHERE logradouro = '$logradouro' AND numero = '$numero'");
		if(!$result)
			$erros = $erros.'&logradouro';
	}
	$linha = pg_fetch_array($result, 0);
	$logradouro_id = $linha['id_logradouro'];

	$longitude = 'null';
	$latitude = 'null';
}else{ //valida os dados de latitude e longitude
	if(!preg_match("/^[-+]?\d*\.?\d*$/", $longitude) || strlen($longitude) <= 0)
		$erros = $erros.'&longitude';
	if(!preg_match("/^[-+]?\d*\.?\d*$/", $latitude) || strlen($latitude) <= 0)
		$erros = $erros.'&latitude';
}

$timestamp = $data.' '.$hora.':00';

if(strlen($erros) > 0){
    //echo pg_last_error();
    header('location:index.php?pagina=cadastrarChamado'.$erros);
//caso esteja tudo certo, procede com a inserção no banco de dados
}else{
	//insere a ocorrencia no banco de dados
	$query = "INSERT INTO chamado 
			(data_hora,origem,nome,telefone,chamado_logradouro_id)
			VALUES
			('$timestamp','$origem','$nome','$telefone',$logradouro_id)";

	$result = pg_query($connection, $query);
	if(!$result){
		//echo pg_last_error();
		header('location:index.php?pagina=cadastrarChamado&erroDB');
	}else{
		header('location:index.php?pagina=cadastrarChamado&sucesso');
	}
}
