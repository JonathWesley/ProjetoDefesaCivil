<?php
    include 'database.php';
    
    $pesquisa_ocorrencia = addslashes($_POST['pesquisa_ocorrencia']);
    $pesquisa_filtro = $_POST['pesquisa_filtro'];

    $items_por_pagina = 7;
    $pagina = intval($_GET['n']);
    $offset = $pagina * $items_por_pagina;
    $numero_total = 1;

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
                <th onclick="sortTable(0)">Cobrade<span class="glyphicon glyphicon-sort sort-icon"></span></th>
                <th onclick="sortTable(1)">Atendido<span class="glyphicon glyphicon-sort sort-icon"></span></th>
                <th onclick="sortTable(2)">Agente<span class="glyphicon glyphicon-sort sort-icon"></span></th>
                <th onclick="sortTable(3)">Data<span class="glyphicon glyphicon-sort sort-icon"></span></th>
            </tr></thead>
            <tbody>
            <?php
                $i = 0;
                while($linha = pg_fetch_array($consulta_ocorrencias, $i)){
                    echo '<td><a href="index.php?pagina=exibirOcorrencia&id='.$linha['id_ocorrencia'].'"><span class="glyphicon glyphicon-fullscreen"></span></a></td>';
                    echo '<td>'.$linha[''].'</td>';
                    echo '<td>'.$linha[''].'</td>';
                    echo '<td>'.$linha[''].'</td>';
                    echo '<td>'.$linha[''].'</td></tr>';
                    $i += 1;
                }
            ?>
            <tbody>
        <table>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                <a href="index.php?pagina=consultarChamado&n=0">
                    <span>Inicio</span>
                </a>
                </li>
                <?php for($i=0; $i<$numero_de_paginas;$i++){ 
                    $estilo = "";
                    if($pagina == $i)
                        $estilo = 'class="active"';
                ?>
                <li <?php echo $estilo; ?> ><a href="index.php?pagina=consultarChamado&n=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
                <li>
                <?php } ?>
                <a href="index.php?pagina=consultarChamado&n=<?php echo $numero_de_paginas-1 ?>">
                    <span>Fim</span>
                </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
</div>  