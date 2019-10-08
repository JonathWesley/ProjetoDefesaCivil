<?php
    include 'database.php';
    
    $pesquisa_chamado = addslashes($_POST['pesquisa_chamado']);
    $pesquisa_filtro = $_POST['filtro'];

    $items_por_pagina = 7;
    $pagina = intval($_GET['n']);
    $offset = $pagina * $items_por_pagina;
    $numero_total = 1;

    if(isset($_POST['pesquisa_chamado']) && $pesquisa_chamado != null){
        $query = "SELECT chamado.id_chamado,TO_CHAR(chamado.data_hora, 'DD/MM/YYYY') as dataa,
                        chamado.origem,pessoa.nome,chamado.descricao, chamado.prioridade  
                        FROM chamado INNER JOIN pessoa ON (chamado.pessoa_id = pessoa.id_pessoa)";
        
        if($pesquisa_filtro == 'data')
            $query = $query." WHERE TO_CHAR(data_hora, 'DD/MM/YYYY') >= '$pesquisa_chamado'";
        else
            $query = $query." WHERE $pesquisa_filtro ILIKE '$pesquisa_chamado%'";

        if($_POST['finalizado'] != true)
            $query = $query." AND chamado.usado = false";

        $consulta_chamados = pg_query($connection, $query) or die(preg_last_error());
        $numero_total = pg_num_rows($consulta_chamados);
    
        $consulta_chamados = pg_query($connection, $query." LIMIT $items_por_pagina OFFSET $offset") or die(preg_last_error());
    }else{
        $query = "SELECT chamado.id_chamado,TO_CHAR(chamado.data_hora, 'DD/MM/YYYY') as dataa,
        chamado.origem,pessoa.nome,chamado.descricao, chamado.prioridade 
        FROM chamado INNER JOIN pessoa ON (chamado.pessoa_id = pessoa.id_pessoa)";
        
        if($_POST['finalizado'] != true)
            $query = $query." WHERE chamado.usado = false";

        $consulta_chamados = pg_query($connection, $query) or die(preg_last_error());
        $numero_total = pg_num_rows($consulta_chamados);

        $query = $query." ORDER BY chamado.data_hora
        LIMIT $items_por_pagina OFFSET $offset";

        $consulta_chamados = pg_query($connection, $query) or die(preg_last_error());
    }

    if($numero_total <= 0)
        $numero_total = 1;

    $numero_de_paginas = ceil($numero_total / $items_por_pagina);
?>

<div class="container positioning">
<div class="jumbotron campo_cadastro">
<?php echo pg_last_error(); ?>
    <div class="box">
        <form class="input-group" method="post" action="index.php?pagina=consultarChamado&n=0">
            <input type="text" class="form-control" name="pesquisa_chamado" placeholder="Pesquisa" value="<?php echo $_POST['pesquisa_chamado']; ?>">
            <span>Filtrar por: </span>
            <select name="filtro" onchange="this.form.submit()" ng-model="sel_filtro" ng-init="sel_filtro='<?php if(isset($_POST['filtro'])){echo $_POST['filtro'];}else{echo 'data';} ?>'">
                <option value="data">Data</option>
                <option value="chamado.origem">Origem</option>
                <option value="pessoa.nome">Atendido</option>
                <option value="chamado.descricao">Descricao</option>
            </select>
            <span class="ocorrencias_encerradas">Mostrar chamados finalizados: </span>
            <input name="finalizado" onchange="this.form.submit()" value="true" type="checkbox" <?php if($_POST['finalizado']==true)echo 'checked'; ?>>
        </form>
    </div>
    <div class="box">
        <table id="tabela" class="table table-striped table-bordered" style="width:100%">
            <thead><tr>
                <th><!--<span class="glyphicon glyphicon-fullscreen"></span>--></th>
                <th onclick="sortTable(0)">Data<span class="glyphicon glyphicon-sort sort-icon"></span></th>
                <th onclick="sortTable(1)">Origem<span class="glyphicon glyphicon-sort sort-icon"></span></th>
                <th onclick="sortTable(2)">Atendido<span class="glyphicon glyphicon-sort sort-icon"></span></th>
                <th onclick="sortTable(3)" class="elimina-tabela">Descricao<span class="glyphicon glyphicon-sort sort-icon elimina-tabela"></span></th>
            </tr></thead>
            <tbody>
            <?php
                $i = 0;
                if(pg_fetch_array($consulta_chamados, $i) == 0)
                    echo '<tr><td colspan="5" class="text-center">Nenhum chamado encontrado</td></tr>';
                while($linha = pg_fetch_array($consulta_chamados, $i)){
                    echo '<tr style="background-color:';
                    if($linha['prioridade'] == "Alta")
                        echo '#ff5050;">';
                    else if($linha['prioridade'] == "Média")
                        echo '#fff050;">';
                    else
                        echo '#88ff50;">';
                    echo '<td class="text-center"><a href="index.php?pagina=exibirChamado&id='.$linha['id_chamado'].'"><span class="glyphicon glyphicon-eye-open"></span></a></td>';
                    echo '<td>'.$linha['dataa'].'</td>';
                    echo '<td>'.$linha['origem'].'</td>';
                    echo '<td>'.$linha['nome'].'</td>';
                    echo '<td class="elimina-tabela">'.$linha['descricao'].'</td></tr>';
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