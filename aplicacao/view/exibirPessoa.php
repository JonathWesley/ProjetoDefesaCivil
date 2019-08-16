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
    <h3 class="text-center" style="margin:5px;">Pessoa</h3>
    </div>
    <div class="box">
        <br><span class="titulo">Nome: </span><?php echo $linhaPessoa['nome']; ?>
        <hr>
        <span class="titulo">CPF: </span><?php echo substr($linhaPessoa['cpf'],0,3).'.'.substr($linhaPessoa['cpf'],3,3).'.'.substr($linhaPessoa['cpf'],6,3).'-'.substr($linhaPessoa['cpf'],9,2); ?>
        <hr>
        <span class="titulo">Email: </span><?php echo $linhaPessoa['email']; ?>
        <br>
        <span class="titulo">Telefone: </span><?php echo '('.substr($linhaPessoa['telefone'],0,2).')'.substr($linhaPessoa['telefone'],2,5).'-'.substr($linhaPessoa['telefone'],7); ?>
        <br><br>
    </div>
</div>
</div>