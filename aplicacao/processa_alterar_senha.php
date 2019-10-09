<?php
include 'database.php';

session_start();
$id_usuario = $_SESSION['id_usuario'];

$senha_anterior = $_POST['senha_anterior'];
$nova_senha = $_POST['nova_senha'];
$senha_confirma = $_POST['senha_confirma'];

$query = "SELECT email,senha FROM dados_login WHERE id_usuario = $id_usuario";
$result = pg_query($connection, $query);

if(!$result){ //caso ocorra algum erro na conexao
    //echo pg_last_error();
    header('location:alterarSenha.php?erroBD');
}else{
    $linha = pg_fetch_array($result, 0);
    $hash = $linha['senha']; //pega a senha do banco de dados
    if(crypt($senha, $hash) === $hash){ //compara com a criptografia
        //inicia uma sessao, e salva o id do usuario logado
        
        header('location:index.php?pagina=home');
    }else{
        //retorna o erro
        header('location:index.php?erro');
    }
}
