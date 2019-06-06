<?php
include 'database.php';

//funcoes de validacao do preenchimento dos campos

function validaCPF($cpf) {
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf{$c} * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf{$c} != $d) {
            return false;
        }
    }
    return true;
}

function validaCelular($telefone){
    $telefone = trim(str_replace('/', '', str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $telefone))))));

    //$regexCel = '/[0-9]{2}[6789][0-9]{3,4}[0-9]{4}/'; // Regex para validar somente celular
    if(preg_match("/^[0-9]{11}$/", $telefone)){
        return true;
    }else{
        return false;
    }
}

$nome = addslashes($_POST['nome']);
$cpf = addslashes($_POST['cpf']);
$telefone = addslashes($_POST['telefone']);
$nivel_acesso = addslashes($_POST['nivel_acesso']);
$email = addslashes($_POST['email_cadastro']);
$senha = ($_POST['senha_cadastro']);
$senha_confirma = ($_POST['senha_cadastro_confirma']);

$erros = '';

//validacao dos campos
if(!preg_match("/^([a-zA-Z' ]+)$/",$nome)) //aceita apenas letras e espaço em branco
	$erros = $erros.'&nome';
if(!validaCPF($cpf)) //envia para a funcao de validacao do cpf
	$erros = $erros.'&cpf';
if(!validaCelular($telefone)) //envia para a funcao de validacao do telefone
	$erros = $erros.'&telefone';
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) //valida em formato de email
    $erros = $erros.'&email';
//aceita apenas senhas que tenhas mais de 5 digitos, com pelo menos 1 numero, 1 letra maiuscula e 1 letra minuscula
if(strlen($senha<6 || !preg_match("#[0-9]+#",$senha)) || !preg_match("#[A-Z]+#",$senha) || !preg_match("#[a-z]+#",$senha))
	$erros = $erros.'&senha';
if($senha != $senha_confirma) //compara as senhas
	$erro = $erros.'$confirma_senha';

//caso ocorra algum erro na validacao, entao volta para a pagina e indica onde esta o erro
if(strlen($erros) > 0){
	header('location:index.php?pagina=cadastrarUsuario'.$erros);
//caso esteja tudo certo, procede com a inserção no banco de dados
}else{
	$custo = '08';
	$string = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$salt = '';
	for ($i = 0; $i < 22; $i++){
		$salt = $salt.$string[rand(0,61)];
	}
	$salt = str_shuffle($salt);
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
	if($nivel_acesso == 'Diretor'){
		$acesso = 1;
	}else if($nivel_acesso == 'Coordenador'){
		$acesso = 2;
	}else{
		$acesso = 3;
	}

	$result = pg_query($connection, "INSERT INTO usuario 
						(id_usuario, nome, cpf, telefone, nivel_acesso) 
						VALUES ($id, '$nome', '$cpf', '$telefone', $acesso)");
	if(!$result)
		header('location:index.php?pagina=cadastrarUsuario&erroDB');
		//echo 'Erro: '.pg_last_error();
	else
		header('location:index.php?pagina=cadastrarUsuario&sucesso');
}

