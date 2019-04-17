    <div class="container positioning">
    <div class="jumbotron text-center">
        <img src="images/logo.jpg" alt="DefesaCivil" class="img-circle">
        <?php 
            $linha = pg_fetch_array($consulta_login, 0);
            echo '<p>Nome: '.$linha['nome'].'</p>';
            echo '<p>CPF: '.$linha['cpf'].'</p>';
            echo '<p>Telefone: '.$linha['telefone'].'</p>';
            $nivel_acesso='';
            if($linha['nivel_acesso']==1)
                $nivel_acesso = 'Administrador';
            else if($linha['nivel_acesso']==2)
                $nivel_acesso = 'Usuário 1';
            else
                $nivel_acesso = 'Usuário 2';
            echo '<p>Nivel de acesso: '.$nivel_acesso.'</p>';
        ?>
    </div>
    </div>