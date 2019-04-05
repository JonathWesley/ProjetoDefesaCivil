<a href="?pagina=inserir_curso">Inserir novo curso</a>
<table style="border:1px solid #ccc; width=100%">   
    <tr>
        <th>Nome curso</th>
        <th>Carga horária</th>
    </tr>
    <?php
        $i = 0;
        while($linha = pg_fetch_array($result_curso, $i)){
            echo '<tr><td>'.$linha['nome_curso'].'</td>';
            echo '<td>'.$linha['carga_horaria'].'</td></tr>';
            $i += 1;
        }
    ?>
</table>