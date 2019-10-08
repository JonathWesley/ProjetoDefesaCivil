<?php
    include 'database.php';

    session_start();
    $id_usuario = $_SESSION['id_usuario'];

    $query = "SELECT foto FROM usuario WHERE id_usuario = $id_usuario";
    $result = pg_query($connection, $query);
    $linha = pg_fetch_array($result, 0);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <link rel= "stylesheet" type="text/css" href="css/main.css">
    <title>Defesa Civil</title>
</head>
<body>
    <div ng-app="myApp" ng-controller="myCtrl">
    <header>
    <?php if($_GET['pagina'] == 'monitorarChamado'){ ?>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" style="font-size:35px;" href="?pagina=home">Defesa Civil</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="?pagina=consultarChamado">Voltar</a></li>
                </ul>
            </div>
        </nav>
    <?php }else{ ?>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" style="font-size: 35px" href="?pagina=home">Defesa Civil</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Monitoramento <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="?pagina=visualizarSensores">Sensores</a></li>
                        <li><a href="?pagina=monitorarChamado">Chamados</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Chamados <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="?pagina=cadastrarChamado">Cadastrar</a></li>
                        <li><a href="?pagina=consultarChamado">Consultar</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ocorrências <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="?pagina=cadastrarOcorrencia">Cadastrar</a></li>
                        <li><a href="?pagina=consultarOcorrencia">Consultar</a></li>
                        </ul>
                    </li>
                    <?php if($_SESSION['nivel_acesso'] == 1){ ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuários <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="?pagina=cadastrarUsuario">Cadastrar</a></li>
                        <li><a href="?pagina=consultarUsuario">Consultar</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <img src="data:image/png;base64,<?php echo $linha['foto']; ?>" alt="fotoperfil" class="img-circle img-perfil">
                        </a>
                        <ul class="dropdown-menu">
                        <li><a href="?pagina=perfil">Perfil</a></li>
                        <li><a href="logout.php">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    <?php } ?>
    </header>

    <div id="conteudo" class="container">