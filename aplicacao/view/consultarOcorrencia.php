<?php
    include 'database.php';
    
    $pesquisa_ocorrencia = intval($_POST['pesquisa_ocorrencia']);

    $items_por_pagina = 4;
    $pagina = intval($_GET['n']);
    $offset = $pagina * $items_por_pagina;

    if(isset($_POST['pesquisa_ocorrencia']) && $pesquisa_ocorrencia != null){
        $consulta_ocorrencias = pg_query($connection, 
        "SELECT id_ocorrencia,ocorr_cobrade,ocorr_prioridade 
        FROM ocorrencia WHERE CAST(id_ocorrencia AS TEXT) LIKE '$pesquisa_ocorrencia%'
        LIMIT $items_por_pagina OFFSET $offset") or die(preg_last_error());
    }else{
        $consulta_ocorrencias = pg_query($connection, 
        "SELECT id_ocorrencia,ocorr_cobrade,ocorr_prioridade 
        FROM ocorrencia
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
    <?php
        $i = 0;
        while($linha = pg_fetch_array($consulta_ocorrencias, $i)){
            echo '<div class="box">';
            echo '<nav><span>ID: '.$linha['id_ocorrencia'].'</span></nav>';
            echo '<nav><span>Cobrade: '.$linha['ocorr_cobrade'].'</span></nav>';
            echo '<nav><span>Prioridade: '.$linha['ocorr_prioridade'].'</span></nav>';
            echo '</div>';
            $i += 1;
        }
    ?>
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