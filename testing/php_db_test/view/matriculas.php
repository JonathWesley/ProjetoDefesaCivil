<table style="border:1px solid #ccc; width=100%">   
    <tr>
        <th>Nome aluno</th>
        <th>Nome curso</th>
    </tr>
    <?php
        $i = 0;
        while($linha = pg_fetch_array($result_aluno_curso, $i)){
            echo '<tr><td>'.$linha['nome_aluno'].'</td>';
            echo '<td>'.$linha['nome_curso'].'</td></tr>';
            $i += 1;
        }
    ?>
</table>