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
    <link rel= "stylesheet" type="text/css" href="css/main.css">
    <title>Defesa Civil</title>
</head>
<body>
    <div ng-app="myApp" ng-controller="myCtrl">
    <header>
        <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="?pagina=home" class="navbar-brand" style="font-size: 30px;">Defesa Civil</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><u style="font-size:20px;">Sair</u></a></li>
                <li><a href="?pagina=perfil"><img src="images/logo.jpg" alt="DefesaCivil" class="img-circle img-perfil"></a></li>
            </ul>
        </div>
        </nav>
        <h4 class="navegation"><a href="?pagina=home"><u ng-repeat="x in caminho">{{x.name + " > "}}</u></a></h4>
    </header>

    <div class="side-menu">
        <div class="container">
        <div class="jumbotron">
            <h4 class="text-center">Ocorrências</h4>
            <ul class="menu-ul">
                <li><a href="?pagina=cadastrarOcorrencia">Cadastrar</a></li>
                <li><a href="?pagina=consultarOcorrencia&n=0">Consultar</a></li>
            </ul>
        </div>
        </div>

        <div class="container">
        <div class="jumbotron">
            <h4 class="text-center">Usuários</h4>
            <ul class="menu-ul">
                <li><a href="?pagina=cadastrarUsuario">Cadastrar</a></li>
                <li><a href="?pagina=consultarUsuario&n=0">Consultar</a></li>
            </ul>
        </div>
        </div>
    </div>
    </div>

    <div id="conteudo" class="container">