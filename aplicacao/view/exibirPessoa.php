<?php
    include 'database.php';

    $id_pessoa = $_GET['id'];

    $query = "SELECT * FROM pessoa WHERE id_pessoa = $id_pessoa";
    $result = pg_query($connection, $query) or die(pg_last_error());
    $linhaPessoa = pg_fetch_array($result, 0);
?>

<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <div class="box">
        <p>Nome: <?php echo $linhaPessoa['nome']; ?></p>
        <p>CPF: <?php echo substr($linhaPessoa['cpf'],0,3).'.'.substr($linhaPessoa['cpf'],3,3).'.'.substr($linhaPessoa['cpf'],6,3).'-'.substr($linhaPessoa['cpf'],9,2); ?></p>
        <p>Telefone: <?php echo '('.substr($linhaPessoa['telefone'],0,2).')'.substr($linhaPessoa['telefone'],2,5).'-'.substr($linhaPessoa['telefone'],7); ?></p>
        <p>Email: <?php echo $linhaPessoa['email']; ?></p>
    </div>
</div>
</div>