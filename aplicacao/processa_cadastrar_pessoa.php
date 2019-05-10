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

    $nome = addslashes($_POST['nome_pessoa']);
    $cpf = addslashes($_POST['cpf_pessoa']);
    $pass = addslashes($_POST['pass_pessoa']);
    $telefone = addslashes($_POST['telefone_pessoa']);
    $email = addslashes($_POST['email_pessoa']);

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

    if($nome != null){
        $result = pg_query($connection, 
        "INSERT INTO pessoa (nome,cpf,outros_documentos,telefone,email) 
        VALUES ('$nome','$cpf','$pass','$telefone','$email')")
        or die(pg_last_error());

        // if(!$result)
		//     echo 'Erro: '.pg_last_error();
	    // else
		//     header('location:index.php?pagina=cadastrarOcorrencia');
    }