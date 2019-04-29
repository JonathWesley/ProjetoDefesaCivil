<?php
    include 'database.php';

    $nome = addslashes($_POST['nome_pessoa']);
    $cpf = addslashes($_POST['cpf_pessoa']);
    $pass = addslashes($_POST['pass_pessoa']);
    $telefone = addslashes($_POST['telefone_pessoa']);
    $email = addslashes($_POST['email_pessoa']);

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