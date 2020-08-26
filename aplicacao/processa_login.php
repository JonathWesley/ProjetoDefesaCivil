<?php
//inclui a conexao com o banco de dados
include 'database.php';

//recebe email e senha do usuario
$email = addslashes($_POST['email']);
$senha = $_POST['senha'];

//seleciona a senha q existe no banco de dados
$query = "SELECT * FROM dados_login WHERE email = '$email' AND ativo = TRUE";
$result = pg_query($connection, $query);

if(!$result){ //caso ocorra algum erro na conexao
    //echo pg_last_error();
    header('location:index.php?erroBD');
}else{
    if(pg_num_rows($result) == 1){ //caso soh exista um registro com o email dado
        $linha = pg_fetch_array($result, 0);
        $hash = $linha['senha']; //pega a senha do banco de dados
        if(crypt($senha, $hash) === $hash){ //compara com a criptografia
            //inicia uma sessao, e salva o id do usuario logado
            session_start();
            $id = pg_fetch_array($result, 0)['id_usuario'];
            $_SESSION['id_usuario'] = $id;

            //pega o nivel de acesso do usuario fazendo login
            $consulta_login = pg_query($connection, "SELECT nivel_acesso FROM usuario WHERE id_usuario = $id");
            $_SESSION['nivel_acesso'] = pg_fetch_array($consulta_login, 0)['nivel_acesso'];
            $_SESSION['login'] = true;

            //salva o login na tabela de log
            $data = date('Y-m-d H:i:s');
            $query = "INSERT INTO log_login (id_usuario,data_hora) VALUES ($id, '$data')";
            $result = pg_query($connection, $query);

            //envia para a pagina principal
            //echo pg_last_error();
            if($_SESSION['nivel_acesso'] == 4){
                header('location:index.php?pagina=monitorarChamado');
            }else{
                header('location:index.php?pagina=home');
            }
            
        }else{
            //retorna o erro
            header('location:index.php?erro');
        }
    }else{
        //retorna o erro;
        header('location:index.php?erro');
    }
}
