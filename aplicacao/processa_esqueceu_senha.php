<?php
include 'database.php';

$email = addslashes($_POST['email']);

$erros = '';

if(isset($_POST['email']) && !empty($_POST['email'])){
    $query = "SELECT * FROM dados_login WHERE email = '$email'";
    $result = pg_query($connection, $query);
    if(pg_num_rows($result) == 1){
        $senha = pg_fetch_array($result, 0)['senha'];
        $assunto = 'Recuperação de senha';
        $mensagem = 'Por favor use essa senha para login: '.$senha;
        $header = 'From: jonathherdt@gmail.com';
        if(mail($email, $assunto, $mensagem, $header)){
            header('location:index.php?pagina=esqueceuSenha&sucesso');
        }else{
            $erros = "&naoEnviou";
        }
    }else{
        $erros = "&naoAchou";
    }
}
echo pg_last_error();
header('location:index.php?pagina=esqueceuSenha&erro'.$erros);