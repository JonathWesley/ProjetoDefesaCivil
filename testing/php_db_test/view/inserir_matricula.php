<h1>Inserir nova matricula</h1>
<p>Selecione o curso</p>

<form method="post" action="processa_matricula.php">
<select name="escolha_aluno">
    <?php
        $i = 0;
        while($linha = pg_fetch_array($result_aluno, $i)){
            echo '<option value="'.$linha['id_aluno'].'">'.$linha['nome_aluno'].'</option>';
            $i += 1;
        }
    ?>
</select>
<select name="escolha_curso">
    <?php
        $i = 0;
        while($linha = pg_fetch_array($result_curso, $i)){
            echo '<option value="'.$linha['id_curso'].'">'.$linha['nome_curso'].'</option>';
            $i += 1;
        }
    ?>
</select>
<br>
<button type="submit">Matricular</button>
</form>