<a href="?pagina=inserir_matricula">Inserir nova matricula</a>
<table style="border:1px solid #ccc; width=100%">   
    <tr>
        <th>Nome aluno</th>
        <th>Nome curso</th>
        <th>Deletar</th>
    </tr>
    <?php
        $i = 0;
        while($linha = pg_fetch_array($result_aluno_curso, $i)){
            echo '<tr><td>'.$linha['nome_aluno'].'</td>';
            echo '<td>'.$linha['nome_curso'].'</td>';
            $i += 1;
    ?>
        <td><a href="deleta_matricula.php?id_aluno_curso=<?php echo $linha['id_aluno_curso'];?>">Deletar</a></td></tr>
    <?php
        }
    ?>
</table>