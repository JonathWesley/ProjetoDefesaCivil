<?php
    include 'database.php';

    $id_usuario = $_GET['id'];

    $query = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
    $result = pg_query($connection, $query);
    $linha = pg_fetch_array($result, 0);
?>

<div class="container positioning">
    <div class="jumbotron text-center">
    <div class="box">
    <?php echo pg_last_error(); ?>
        <p>Nome: <?php echo $linha['nome']; ?></p>
        <p>CPF: <?php echo substr($linha['cpf'],0,3).'.'.substr($linha['cpf'],3,3).'.'.substr($linha['cpf'],6,3).'-'.substr($linha['cpf'],9,2); ?></p>
        <p>Telefone: <?php echo '('.substr($linha['telefone'],0,2).')'.substr($linha['telefone'],2,5).'-'.substr($linha['telefone'],7); ?></p>
        <p>Nivel de acesso: <?php if($linha['nivel_acesso']==1){echo 'Administrador';}else if($linha['nivel_acesso']==2){echo 'Usuário 1';}else{echo 'Usuário 2';} ?></p>
    </div>
    </div>
</div>