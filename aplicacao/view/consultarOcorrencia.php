<?php
    include 'database.php';
    
    $pesquisa_ocorrencia = addslashes($_POST['pesquisa_ocorrencia']);

    $items_por_pagina = 6;
    $pagina = intval($_GET['n']);
    $offset = $pagina * $items_por_pagina;
    $numero_total = 1;

    if(isset($_POST['pesquisa_ocorrencia']) && $pesquisa_ocorrencia != null){
        $consulta_ocorrencias = pg_query($connection, 
        "SELECT ocorrencia.id_ocorrencia,ocorrencia.ocorr_prioridade, TO_CHAR(ocorrencia.data_ocorrencia, 'DD/MM/YYYY') as data_ocorrencia,
        usuario.nome,cobrade.subgrupo
        FROM ocorrencia INNER JOIN usuario ON ocorrencia.agente_principal = usuario.id_usuario 
        INNER JOIN cobrade ON ocorrencia.ocorr_cobrade = cobrade.codigo
        WHERE CAST(id_ocorrencia AS TEXT) LIKE '$pesquisa_ocorrencia%'") or die(preg_last_error());
        $numero_total = pg_num_rows($consulta_ocorrencias);
    
        $consulta_ocorrencias = pg_query($connection, 
        "SELECT ocorrencia.id_ocorrencia,ocorrencia.ocorr_prioridade, TO_CHAR(ocorrencia.data_ocorrencia, 'DD/MM/YYYY') as data_ocorrencia,
        usuario.nome,cobrade.subgrupo
        FROM ocorrencia INNER JOIN usuario ON ocorrencia.agente_principal = usuario.id_usuario 
        INNER JOIN cobrade ON ocorrencia.ocorr_cobrade = cobrade.codigo
        WHERE CAST(id_ocorrencia AS TEXT) LIKE '$pesquisa_ocorrencia%'
        ORDER BY data_ocorrencia DESC
        LIMIT $items_por_pagina OFFSET $offset") or die(preg_last_error());
    }else{
        $consulta_ocorrencias = pg_query($connection, 
        "SELECT ocorrencia.id_ocorrencia,ocorrencia.ocorr_prioridade, TO_CHAR(ocorrencia.data_ocorrencia, 'DD/MM/YYYY') as data_ocorrencia,
        usuario.nome,cobrade.subgrupo
        FROM ocorrencia INNER JOIN usuario ON ocorrencia.agente_principal = usuario.id_usuario 
        INNER JOIN cobrade ON ocorrencia.ocorr_cobrade = cobrade.codigo") or die(preg_last_error());
        $numero_total = pg_num_rows($consulta_ocorrencias);

        $consulta_ocorrencias = pg_query($connection, 
        "SELECT ocorrencia.id_ocorrencia,ocorrencia.ocorr_prioridade, TO_CHAR(ocorrencia.data_ocorrencia, 'DD/MM/YYYY') as data_ocorrencia,
        usuario.nome,cobrade.subgrupo
        FROM ocorrencia INNER JOIN usuario ON ocorrencia.agente_principal = usuario.id_usuario 
        INNER JOIN cobrade ON ocorrencia.ocorr_cobrade = cobrade.codigo
        ORDER BY data_ocorrencia DESC
        LIMIT $items_por_pagina OFFSET $offset") or die(preg_last_error());
    }

    if($numero_total <= 0)
        $numero_total = 1;

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
        <table id="tabela" class="table table-striped table-bordered" style="width:100%">
            <thead><tr>
                <th><!--<span class="glyphicon glyphicon-fullscreen"></span>--></th>
                <th onclick="sortTable(0)">ID<span class="glyphicon glyphicon-sort sort-icon"></span></th>
                <th onclick="sortTable(1)">Cobrade<span class="glyphicon glyphicon-sort sort-icon"></span></th>
                <th onclick="sortTable(2)">Prioridade<span class="glyphicon glyphicon-sort sort-icon"></span></th>
                <th onclick="sortTable(3)">Agente<span class="glyphicon glyphicon-sort sort-icon"></span></th>
                <th onclick="sortTable(4)">Data<span class="glyphicon glyphicon-sort sort-icon"></span></th>
            </tr></thead>
            <tbody>
            <?php
                $i = 0;
                while($linha = pg_fetch_array($consulta_ocorrencias, $i)){
                    echo '<tr><td><a href="index.php?pagina=exibirOcorrencia&id='.$linha['id_ocorrencia'].'"><span class="glyphicon glyphicon-fullscreen"></span></a></td>';
                    echo '<td>'.$linha['id_ocorrencia'].'</td>';
                    echo '<td>'.$linha['subgrupo'].'</td>'; 
                    echo '<td>'.$linha['ocorr_prioridade'].'</td>';
                    echo '<td>'.$linha['nome'].'</td>';
                    echo '<td>'.$linha['data_ocorrencia'].'</td></tr>';
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