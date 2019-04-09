<?php if(!isset($_GET['editar'])){ ?>

<h1>Insirir novo curso</h1>
<form method="post" action="processa_curso.php">
    <br>
    <label>Nome curso:</label><br>
    <input type="text" name="nome_curso" placeholder="Insira o nome do curso">
    <br><br>
    <label>Carga horaria:</label>
    <br>
    <input type="text" name="carga_horaria" placeholder="Insira a carga horaria">
    <br><br>
    <input type="submit" value="Inserir curso">
</form>

<?php }else{  ?>
<?php $i = 0; while($linha = pg_fetch_array($result_aluno, $i)){ ?>
    <?php if($linha['id_curso'] == $_GET['editar']){ ?>

<h1>Editar curso</h1>
<form method="post" action="edita_curso.php">
    <br>
    <label>Nome curso:</label><br>
    <input type="text" name="nome_curso" placeholder="Insira o nome do curso" value="<?php echo $linha['nome_curso']; ?>">
    <br><br>
    <label>Carga horaria:</label>
    <br>
    <input type="text" name="carga_horaria" placeholder="Insira a carga horaria" value="<?php echo $linha['carga_horaria']; ?>">
    <br><br>
    <input type="submit" value="Editar curso">
</form>
    
    <?php }?>
<?php }?>
<?php }?>