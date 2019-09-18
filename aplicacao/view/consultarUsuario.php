<?php
    include 'database.php';
    
    $pesquisa_usuario = '';
    if(isset($_POST['pesquisa_usuario']))
        $pesquisa_usuario = addslashes($_POST['pesquisa_usuario']);

    $items_por_pagina = 4;
    $pagina = intval($_GET['n']);
    $offset = $pagina * $items_por_pagina;

    $consulta_usuarios = pg_query($connection, 
    "SELECT dados_login.id_usuario,dados_login.email,usuario.nome,usuario.telefone FROM dados_login 
    INNER JOIN usuario ON dados_login.id_usuario = usuario.id_usuario WHERE nome LIKE '$pesquisa_usuario%' AND ativo = true
    ORDER BY nome
    LIMIT $items_por_pagina OFFSET $offset") or die(preg_last_error());
    
    $numero_total = pg_num_rows($consulta_usuarios);
    if($numero_total <= 0)
        $numero_total = 1;
    $numero_de_paginas = ceil($numero_total / $items_por_pagina);
?>
<div class="container positioning">
    <div class="jumbotron campo_cadastro">
        <div class="box">
            <form class="input-group" method="post" action="index.php?pagina=consultarUsuario&n=0">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                <input type="text" class="form-control" name="pesquisa_usuario" placeholder="Pesquisa" value="<?php echo $_POST['pesquisa_usuario']; ?>">
            </form>
        </div>
        <div class="box">
            <table id="tabela" class="table table-striped table-bordered" style="width:100%">
            <thead><tr>
                <th></th>
                <th onclick="sortTable(0)" class="elimina-tabela">ID<span class="glyphicon glyphicon-sort sort-icon elimina-tabela"></th>
                <th onclick="sortTable(1)">Nome<span class="glyphicon glyphicon-sort sort-icon"></th>
                <th onclick="sortTable(2)">Email<span class="glyphicon glyphicon-sort sort-icon"></th>
                <th onclick="sortTable(3)" class="elimina-tabela">Telefone<span class="glyphicon glyphicon-sort sort-icon elimina-tabela"></th>
            </tr></thead>
            <tbody>
            <?php
                session_start();
                $i = 0;
                if(pg_fetch_array($consulta_usuarios, $i) == 1)
                    echo '<tr><td colspan="5" class="text-center">Nenhum usuário encontrado</td></tr>';
                while($linha = pg_fetch_array($consulta_usuarios, $i)){
                    if(strcmp($linha['id_usuario'],$_SESSION['id_usuario']) != 0){
                        echo '<tr><td class="text-center"><a href="index.php?pagina=exibirUsuario&id='.$linha['id_usuario'].'"><span class="glyphicon glyphicon-eye-open"></span></a></td>';
                        echo '<td class="elimina-tabela">'.$linha['id_usuario'].'</td>';
                        echo '<td>'.$linha['nome'].'</td>'; 
                        echo '<td>'.$linha['email'].'</td>';
                        echo '<td class="elimina-tabela">'.$linha['telefone'].'</td></tr>';
                    }
                    $i += 1;
                }
            ?>
            <tbody>
        <table>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                <a href="index.php?pagina=consultarUsuario&n=0">
                    <span>Inicio</span>
                </a>
                </li>
                <?php for($i=0; $i<$numero_de_paginas;$i++){ 
                    $estilo = "";
                    if($pagina == $i)
                        $estilo = 'class="active"';
                ?>
                <li <?php echo $estilo; ?> ><a href="index.php?pagina=consultarUsuario&n=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
                <li>
                <?php } ?>
                <a href="index.php?pagina=consultarUsuario&n=<?php echo $numero_de_paginas-1 ?>">
                    <span>Fim</span>
                </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
</div>