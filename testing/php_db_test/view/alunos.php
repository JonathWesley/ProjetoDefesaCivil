<table style="border:1px solid #ccc; width=100%">   
    <tr>
        <th>Nome aluno</th>
        <th>Data de nascimento</th>
    </tr>
    <?php
        $i = 0;
        while($linha = pg_fetch_array($result_aluno, $i)){
            echo '<tr><td>'.$linha['nome_aluno'].'</td>';
            echo '<td>'.$linha['data_nascimento'].'</td></tr>';
            $i += 1;
        }
    ?>
</table>