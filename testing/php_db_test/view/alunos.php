<a href="?pagina=inserir_aluno">Inserir novo aluno</a>
<table style="border:1px solid #ccc; width=100%">   
    <tr>
        <th>Nome aluno</th>
        <th>Idade</th>
        <th>Deletar</th>
    </tr>
    <?php
        $i = 0;
        while($linha = pg_fetch_array($result_aluno, $i)){
            echo '<tr><td>'.$linha['nome_aluno'].'</td>';
            echo '<td>'.$linha['idade'].'</td>';
            $i += 1;
    ?>
        <td><a href="deleta_aluno.php?id_aluno=<?php echo $linha['id_aluno'];?>">Deletar</a></td></tr>
    <?php
        }
    ?>
</table>