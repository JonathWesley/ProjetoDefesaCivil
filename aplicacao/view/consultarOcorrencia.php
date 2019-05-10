<?php
    include 'database.php';
    
    $pesquisa_ocorrencia = intval($_POST['pesquisa_ocorrencia']);

    $items_por_pagina = 6;
    $pagina = intval($_GET['n']);
    $offset = $pagina * $items_por_pagina;

    if(isset($_POST['pesquisa_ocorrencia']) && $pesquisa_ocorrencia != null){
        $consulta_ocorrencias = pg_query($connection, 
        "SELECT ocorrencia.id_ocorrencia,ocorrencia.ocorr_prioridade,ocorrencia.data_ocorrencia,usuario.nome,cobrade.subgrupo
        FROM ocorrencia INNER JOIN usuario ON ocorrencia.agente_principal = usuario.id_usuario 
        INNER JOIN cobrade ON ocorrencia.ocorr_cobrade = cobrade.codigo
        ORDER BY data_ocorrencia DESC
        WHERE CAST(id_ocorrencia AS TEXT) LIKE '$pesquisa_ocorrencia%'
        LIMIT $items_por_pagina OFFSET $offset") or die(preg_last_error());
    }else{
        $consulta_ocorrencias = pg_query($connection, 
        "SELECT ocorrencia.id_ocorrencia,ocorrencia.ocorr_prioridade,ocorrencia.data_ocorrencia,usuario.nome,cobrade.subgrupo
        FROM ocorrencia INNER JOIN usuario ON ocorrencia.agente_principal = usuario.id_usuario 
        INNER JOIN cobrade ON ocorrencia.ocorr_cobrade = cobrade.codigo
        ORDER BY data_ocorrencia DESC
        LIMIT $items_por_pagina OFFSET $offset") or die(preg_last_error());
    }

    $numero_total = pg_num_rows(pg_query($connection, 
    "SELECT id_ocorrencia,ocorr_cobrade,ocorr_prioridade FROM ocorrencia"));

    $numero_de_paginas = ceil($numero_total / $items_por_pagina);
?>
<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <div class="box">
            <form class="input-group" method="post" action="index.php?pagina=consultarOcorrencia&n=0">
                <input type="text" class="form-control" name="pesquisa_ocorrencia" placeholder="Pesquisa" value="<?php echo $_POST['pesquisa_ocorrencia']; ?>">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            </form>
    </div>
    <div class="box">
        <table class="table table-striped table-bordered" style="width:100%">
            <thead><tr>
                <th>ID</th>
                <th>Cobrade</th>
                <th>Prioridade</th>
                <th>Agente</th>
                <th>Data</th>
            </tr></thead>
            <tbody>
    <?php
        $i = 0;
        while($linha = pg_fetch_array($consulta_ocorrencias, $i)){
            $data = date("d-m-Y", strtotime($linha['data_ocorrencia']));
            echo '<tr><td>'.$linha['id_ocorrencia'].'</td>';
            echo '<td>'.$linha['subgrupo'].'</td>'; 
            echo '<td>'.$linha['ocorr_prioridade'].'</td>';
            echo '<td>'.$linha['nome'].'</td>';
            echo '<td>'.substr($data,0,2).'/'.substr($data,3,2).'/'.substr($data,-4).'</td></tr>';
            $i += 1;
        }
    ?>
            <tbody>
        <table>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                <a href="index.php?pagina=consultarOcorrencia&n=0">
                    <span>Inicio</span>
                </a>
                </li>
                <?php for($i=0; $i<$numero_de_paginas;$i++){ 
                    $estilo = "";
                    if($pagina == $i)
                        $estilo = 'class="active"';
                ?>
                <li <?php echo $estilo; ?> ><a href="index.php?pagina=consultarOcorrencia&n=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
                
                <li>
                <?php } ?>
                <a href="index.php?pagina=consultarOcorrencia&n=<?php echo $numero_de_paginas-1 ?>">
                    <span>Fim</span>
                </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
</div>