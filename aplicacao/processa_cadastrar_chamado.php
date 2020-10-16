<?php
//inclui a conexao com o banco de dados
include 'database.php';

//recebe dados do $_POST
$origem = addslashes($_POST['origem_chamado']);
$nome = addslashes($_POST['nome_chamado']);
$endereco_principal = addslashes($_POST['endereco_principal']);
$longitude = addslashes($_POST['longitude']);
$latitude = addslashes($_POST['latitude']);
$cep = addslashes($_POST['cep']);
$cidade = addslashes($_POST['cidade']);
$bairro = addslashes($_POST['bairro']);
$logradouro = addslashes($_POST['logradouro']);
$numero = addslashes($_POST['complemento']);
$referencia = addslashes($_POST['referencia']);
$descricao = addslashes($_POST['descricao']);
$prioridade = addslashes($_POST['prioridade']);
$distribuicao = addslashes($_POST['distribuicao']);

$erros='';

session_start();
$id_usuario = $_SESSION['id_usuario'];
$dataAtual = date('Y-m-d H:i:s');

$logradouro_id = 'null';
if($endereco_principal == "Logradouro"){
	$cep = str_replace("-","",$cep);
	$result = pg_query($connection, "SELECT * FROM endereco_logradouro
									WHERE logradouro = '$logradouro' AND numero = '$numero'");
	if(pg_num_rows($result) == 0){
		$result = pg_query($connection, "INSERT INTO endereco_logradouro(cep,cidade,bairro,logradouro,numero,referencia)
										VALUES ('$cep','$cidade','$bairro','$logradouro','$numero','$referencia')
										RETURNING id_logradouro") or die(pg_last_error());
		if(!$result)
			$erros = $erros.'&logradouro';
	}
	$linha = pg_fetch_array($result, 0);
	$logradouro_id = $linha['id_logradouro'];

	$result = pg_query($connection, "INSERT INTO log_endereco(id_logradouro, id_usuario, data_hora)
									VALUES ($logradouro_id, $id_usuario, '$dataAtual')");

	$longitude = 'null';
	$latitude = 'null';
}

$pessoa_atendida = 'null';
/*if(strlen($nome) > 0){ //se a pessoa foi informada, busca a mesma no BD 
	$result = pg_query($connection, "SELECT * FROM pessoa WHERE nome = '$nome'");
	if($result){
		if(pg_num_rows($result) == 0){ //pessoa nao encontrada
			$erros = $erros.'&nome';
		}else{  //pessoa encontrada, seleciona o id da mesma
			$linha = pg_fetch_array($result, 0);
			$pessoa_atendida = $linha['id_pessoa'];
		}
	}else //erro no acesso ao BD
		$erros = $erros.'&nome';
}*/

if(strlen($distribuicao) == 0 || $distribuicao == null){ //se o agente foi informado, busca o mesmo no BD
//	$result = pg_query($connection, "SELECT * FROM usuario WHERE nome = '$distribuicao'");
//	if($result){
//		if(pg_num_rows($result) == 0){ //agente nao encontrado
//			$erros = $erros.'&distribuicao';
//		}else{  //agente encontrado, seleciona o id do mesmo
//			$linha = pg_fetch_array($result, 0);
//			$distribuicao = $linha['id_usuario'];
//		}
//	}else //retorna erro caso nao consiga acessar o banco de dados
//		$erros = $erros.'&distribuicao';
//}else //agente nao foi informado
	$distribuicao = 'null';
}

$timestamp = $dataAtual;

if(strlen($erros) > 0){
    //echo pg_last_error();
    header('location:index.php?pagina=cadastrarChamado&erroDB'.$erros);
//caso esteja tudo certo, procede com a inserção no banco de dados
}else{
	//insere a ocorrencia no banco de dados

	$query = "INSERT INTO chamado (data_hora,origem,pessoa_id,chamado_logradouro_id,
			  descricao,endereco_principal,latitude,longitude, agente_id, prioridade, distribuicao, nome_pessoa)
			  VALUES ('$timestamp','$origem',$pessoa_atendida,$logradouro_id,'$descricao',
			  '$endereco_principal',$latitude,$longitude, $id_usuario, '$prioridade', '$distribuicao', '$nome') 
			  RETURNING id_chamado";

	$result = pg_query($connection, $query);
	
	if($result){
		$id_chamado = pg_fetch_array($result, 0)['id_chamado'];
		$query = "INSERT INTO log_chamado (id_usuario, id_chamado, data_hora, acao)
				  VALUES ($id_usuario,$id_chamado,'$dataAtual','cadastrar')";

		$result = pg_query($connection, $query) or die(pg_last_error());
		
		header('location:index.php?pagina=cadastrarChamado&sucesso');
	}else
		//echo pg_last_error();
		header('location:index.php?pagina=cadastrarChamado&erroDB');
}
