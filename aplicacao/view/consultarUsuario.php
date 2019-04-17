    <div class="container positioning">
        <div class="jumbotron">
            <div class="box">
                <div class="input-group">
                    <input id="pesquisa" type="text" class="form-control" name="pesquisa" placeholder="Pesquisa">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                </div>
            </div>    
            <?php
                $i = 0;
                while($linha = pg_fetch_array($consulta_usuarios, $i)){
                    echo '<div class="box">';
                    echo '<nav><span>ID: '.$linha['id'].'</span></nav>';
                    echo '<nav><span>Nome: '.$linha['nome'].'</span></nav>';
                    echo '</div>';
                    $i += 1;
                }
            ?>
        </div>
    </div>