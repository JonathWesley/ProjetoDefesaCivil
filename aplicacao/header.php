<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel= "stylesheet" type="text/css" href="css/main.css">
    <title>Defesa Civil</title>
</head>
<body>
    <div ng-app="myApp" ng-controller="myCtrl">
    <header>
        <!--<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="?pagina=home" class="navbar-brand" style="font-size: 30px;">Defesa Civil</a>
                <h4 class="navegation">
                    <?php /*session_start();
                        $array = $_SESSION['navegacao'];
                        $i = 0; $j = 0;
                        if(sizeof($array) > 8){ $j = sizeof($array) - 8; }
                        while($j < sizeof($array)){
                            if($i > 0){ echo '>'; } ?>
                    <a href="?pagina=<?php echo $array[$j+1]; ?>"><?php echo $array[$j]; ?></a>
                    <?php $i += 1; $j += 2; } */?>
                </h4>
            </div>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                        Usuários
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?pagina=perfil">Perfil</a>
                        <a class="dropdown-item" href="logout.php">Sair</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                        <img src="images/logo.jpg" alt="DefesaCivil" class="img-circle img-perfil">
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?pagina=perfil">Perfil</a>
                        <a class="dropdown-item" href="logout.php">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
        </nav>-->
        <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
            <a class="navbar-brand" href="#">Logo</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="#">Link 1</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Dropdown link
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Link 1</a>
                    <a class="dropdown-item" href="#">Link 2</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                </div>
                </li>
            </ul>
        </nav>
    </header>

<!--
<li><a href="logout.php"><u style="font-size:20px;">Sair</u></a></li>

    <div class="side-menu">
        <div class="container">
        <div class="jumbotron">
            <h4 class="text-center">Chamados</h4>
            <ul class="menu-ul">
                <li><a href="?pagina=cadastrarChamado">Cadastrar</a></li>
                <li><a href="?pagina=consultarChamado&n=0">Consultar</a></li>
            </ul>
        </div>
        </div>

        <div class="container">
        <div class="jumbotron">
            <h4 class="text-center">Ocorrências</h4>
            <ul class="menu-ul">
                <?php //if($_SESSION['nivel_acesso'] == 1){ ?>
                <li><a href="?pagina=cadastrarOcorrencia">Cadastrar</a></li>
                <?php //} ?>
                <li><a href="?pagina=consultarOcorrencia&n=0">Consultar</a></li>
            </ul>
        </div>
        </div>

        <?php //if($_SESSION['nivel_acesso'] == 1){ ?>
        <div class="container">
        <div class="jumbotron">
            <h4 class="text-center">Usuários</h4>
            <ul class="menu-ul">
                <li><a href="?pagina=cadastrarUsuario">Cadastrar</a></li>
                <li><a href="?pagina=consultarUsuario&n=0">Consultar</a></li>
            </ul>
        </div>
        </div>
        <?php //} ?>
    </div>
-->
    <div id="conteudo" class="container">