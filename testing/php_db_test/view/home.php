<h1 style="text-align:center">Bem-vindo</h1>

<form method="post" action="login.php">
    <input type="text" name="usuario" placeholder="usuario" class="form-control">
    <input type="password" name="senha" placeholder="senha" class="form-control">
    <input type="submit" value="Entrar" class="btn btn-success">

    <?php 
        if(isset($_GET['erro'])){
    ?>
            <div>erro</div>
    <?php 
        }
    ?>
</form>