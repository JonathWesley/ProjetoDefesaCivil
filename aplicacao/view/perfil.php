<?php 
    include 'database.php';

    session_start();
    $id = $_SESSION['id_usuario'];
            
    $query = "SELECT usuario.*, dados_login.email 
              FROM usuario 
              INNER JOIN dados_login ON (usuario.id_usuario = dados_login.id_usuario) 
              WHERE usuario.id_usuario = $id";
    $consulta_login = pg_query($connection, $query) or die(pg_last_error());

    $linha = pg_fetch_array($consulta_login, 0);
?>

<div class="container positioning">
<div class="jumbotron text-center">
    <div class="box">
        <h3 class="text-center" style="margin:5px;">Perfil</h3>
    </div>
    <div class="box">
        <div class="row">
            <div class="col-sm-6 text-center">
                <img src="images/logo.jpg" alt="DefesaCivil" class="img-circle">
            </div>
            <div class="col-sm-6">
                <br><span class="titulo">Nome: </span><?php echo $linha['nome']; ?>
                <hr>
                <span class="titulo">CPF: </span><?php echo substr($linha['cpf'],0,3).'.'.substr($linha['cpf'],3,3).'.'.substr($linha['cpf'],6,3).'-'.substr($linha['cpf'],9,2); ?>
                <hr>
                <span class="titulo">Email: </span><?php echo $linha['email']; ?>
                <br>
                <span class="titulo">Telefone: </span><?php echo '('.substr($linha['telefone'],0,2).')'.substr($linha['telefone'],2,5).'-'.substr($linha['telefone'],7); ?>
                <hr>
                <span class="titulo">Nivel de acesso: </span><?php if($linha['nivel_acesso']==1){echo 'Diretor';}else if($linha['nivel_acesso']==2){echo 'Coordenador';}else{echo 'Agente';} ?><br>
                <br>
            </div>
        </div>
    </div>
</div>
</div>