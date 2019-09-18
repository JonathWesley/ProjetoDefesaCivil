<?php
    include 'database.php';

    $nome = addslashes($_GET['nome_pessoa']);
    $cpf = addslashes($_GET['cpf_pessoa']);
    $outros_documentos = addslashes($_GET['outros_documentos']);
    $celular = addslashes($_GET['celular_pessoa']);
    $telefone = addslashes($_GET['telefone_pessoa']);
    $email = addslashes($_GET['email_pessoa']);

    if($nome != null){
        $response = 'Pessoa cadastrado com sucesso';
        if(strlen($erros) == 0){
            $query = "INSERT INTO pessoa (nome,cpf,outros_documentos,telefone,celular,email) 
                      VALUES ('$nome','$cpf','$outros_documentos','$telefone', '$celular','$email') RETURNING id_pessoa";
            $result = pg_query($connection, $query) or die(pg_last_error());
            if(!$result)
                $response = 'Ocorreu um erro com o banco de dados';//'Erro ao cadastrar pessoa';
            else{
                session_start();
                $id_usuario = $_SESSION['id_usuario'];
                $id_pessoa = pg_fetch_array($result, 0)['id_pessoa'];
                $data = date('Y-m-d H:i:s');

                $query = "INSERT INTO log_pessoa (id_pessoa_cadastrada, id_usuario_criador, data_hora)
                          VALUES ($id_pessoa, $id_usuario, '$data')";
                $result = pg_query($connection, $query) or die(pg_last_error());
            }
        }else
            $response = $erros;//'Erro ao cadastrar pessoa';
    }else
        $response = 'Pessoa deve possuir pelo menos um nome';//'Erro ao cadastrar pessoa';

    echo $response;