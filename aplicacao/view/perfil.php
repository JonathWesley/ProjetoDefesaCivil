    <div class="container positioning">
    <div class="jumbotron text-center">
        <img src="images/logo.jpg" alt="DefesaCivil" class="img-circle">
        <?php 
            include 'database.php';

            session_start();
            $id = (int)$_SESSION['id_usuario'];
            $consulta_login = pg_query($connection, "SELECT * FROM usuario WHERE id_usuario = $id");

            $linha = pg_fetch_array($consulta_login, 0);
            $cpf = $linha['cpf'];
            $telefone = $linha['telefone'];
            echo '<p>Nome: '.$linha['nome'].'</p>';
            echo '<p>CPF: '.substr($cpf,0,3).'.'.substr($cpf,3,3).'.'.substr($cpf,6,3).'-'.substr($cpf,9,2).'</p>';
            echo '<p>Telefone: ('.substr($telefone,0,2).')'.substr($telefone,2,5).'-'.substr($telefone,7).'</p>';
            $nivel_acesso='';
            if($linha['nivel_acesso']==1)
                $nivel_acesso = 'Diretor';
            else if($linha['nivel_acesso']==2)
                $nivel_acesso = 'Coordenador';
            else
                $nivel_acesso = 'Agente';
            echo '<p>Nivel de acesso: '.$nivel_acesso.'</p>';
        ?>
    </div>
    </div>