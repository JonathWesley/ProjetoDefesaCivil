<?php
include 'database.php';

$endereco_principal = addslashes($_POST['endereco_principal']);
$longitude = addslashes($_POST['longitude']);
$latitude = addslashes($_POST['latitude']);
$logradouro = addslashes($_POST['logradouro']);
$numero = addslashes($_POST['complemento']);
$referencia = addslashes($_POST['referencia']);
$agente_principal = addslashes($_POST['agente_principal']);
$agente_apoio_1 = addslashes($_POST['agente_apoio_1']);
$agente_apoio_2 = addslashes($_POST['agente_apoio_2']);
$ocorr_retorno = addslashes($_POST['ocorr_retorno']);
$ocorr_referencia = addslashes($_POST['ocorr_referencia']);
$data_lancamento = addslashes($_POST['data_lancamento']);
$data_ocorrencia = addslashes($_POST['data_ocorrencia']);
$descricao = addslashes($_POST['descricao']);
$ocorr_origem = addslashes($_POST['ocorr_origem']);
$pessoa_atendida_1 = addslashes($_POST['pessoa_atendida_1']);
$pessoa_atendida_2 = addslashes($_POST['pessoa_atendida_2']);
$cobrade = addslashes($_POST['cobrade']);
$natureza = addslashes($_POST['natureza']);
$possui_fotos = addslashes($_POST['possui_fotos']);
$prioridade = addslashes($_POST['prioridade']);
$analisado = addslashes($_POST['analisado']);
$congelado = addslashes($_POST['congelado']);
$encerrado = addslashes($_POST['encerrado']);

$logradouro_id = 'null';
if($endereco_principal == "Logradouro"){
	$result = pg_query($connection, "SELECT * FROM endereco_logradouro
									WHERE logradouro = '$logradouro' AND numero = '$numero'");
	if(pg_num_rows($result) == 0){
		$result = pg_query($connection, "INSERT INTO endereco_logradouro(logradouro,numero,referencia)
										VALUES ('$logradouro','$numero','$referencia')");
		if(!$result)
			echo 'Erro: '.pg_last_error();
		$result = pg_query($connection, "SELECT * FROM endereco_logradouro
										WHERE logradouro = '$logradouro' AND numero = '$numero'");
		if(!$result)
			echo 'Erro: '.pg_last_error();
	}
	$linha = pg_fetch_array($result, 0);
	$logradouro_id = $linha['id_logradouro'];

	$longitude = 'null';
	$latitude = 'null';
}

$result = pg_query($connection, "SELECT * FROM usuario WHERE nome = '$agente_principal'");
if(!$result)
	echo 'Erro: '.pg_last_error();
$linha = pg_fetch_array($result, 0);
$agente_principal = $linha['id_usuario'];
if($agente_apoio_1){
	$result = pg_query($connection, "SELECT * FROM usuario WHERE nome = '$agente_apoio_1'");
	if(!$result)
		echo 'Erro: '.pg_last_error();
	$linha = pg_fetch_array($result, 0);
	$agente_apoio_1 = $linha['id_usuario'];
}else
	$agente_apoio_1 = 'null';
if($agente_apoio_2){
	$result = pg_query($connection, "SELECT * FROM usuario WHERE nome = '$agente_apoio_2'");
	if(!$result)
		echo 'Erro: '.pg_last_error();
	$linha = pg_fetch_array($result, 0);
	$agente_apoio_2 = $linha['id_usuario'];
}else
	$agente_apoio_2 = 'null';

if($pessoa_atendida_1){
	$result = pg_query($connection, "SELECT * FROM pessoa WHERE nome = '$pessoa_atendida_1'");
	if(!$result)
		echo 'Erro: '.pg_last_error();
	$linha = pg_fetch_array($result, 0);
	$pessoa_atendida_1 = $linha['id_pessoa'];
}else
	$pessoa_atendida_1 = 'null';
if($pessoa_atendida_2){
	$result = pg_query($connection, "SELECT * FROM pessoa WHERE nome = '$pessoa_atendida_2'");
	if(!$result)
		echo 'Erro: '.pg_last_error();
	$linha = pg_fetch_array($result, 0);
	$pessoa_atendida_2 = $linha['id_pessoa'];
}else
	$pessoa_atendida_2 = 'null';

if($ocorr_referencia == null)
	$ocorr_referencia = 'null';

$query = "INSERT INTO ocorrencia 
		(ocorr_endereco_principal,ocorr_coordenada_latitude,ocorr_coordenada_longitude,
		ocorr_logradouro_id,agente_principal,agente_apoio_1,agente_apoio_2,ocorr_retorno,
		ocorr_referencia,data_lancamento,data_ocorrencia,ocorr_descricao,ocorr_origem,
		atendido_1,atendido_2,ocorr_cobrade,ocorr_natureza,ocorr_fotos,ocorr_prioridade,
		ocorr_analisado,ocorr_congelado,ocorr_encerrado)
		VALUES
		('$endereco_principal',$latitude,$longitude,$logradouro_id,$agente_principal,
		$agente_apoio_1,$agente_apoio_2,$ocorr_retorno,$ocorr_referencia,'$data_lancamento',
		'$data_ocorrencia','$descricao','$ocorr_origem',$pessoa_atendida_1,$pessoa_atendida_2,
		$cobrade,'$natureza',$possui_fotos,'$prioridade',$analisado,$congelado,$encerrado)";

$result = pg_query($connection, $query);
if(!$result)
	echo 'Erro: '.pg_last_error();
	//header('location:index.php?pagina=cadastrarOcorrencia&erroDB');
else
	header('location:index.php?pagina=cadastrarOcorrencia&sucesso');