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
        <img src="images/logo.jpg" alt="DefesaCivil" class="img-rounded corner-img">
        <h1 class="text-center page-title inline">Defesa Civil</h1>
    </header>
    
    <div class="container login-box">
        <div class="jumbotron">
            <form method="post" action="processa_login.php">
                <div class="input-group">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="input-group">
                    <input type="password" class="form-control" name="senha" placeholder="Senha">
                </div>
                <?php 
                    if(isset($_GET['erro'])){
                ?>
                        <div class="alert alert-danger" role="alert">
                            Email e/ou  senha errados.
                        </div>
                <?php 
                    }
                ?>
                <input type="submit" value="Entrar" class="btn btn-default btn-md">
            </form>
        </div>
        <a class="esqueceuSenha" href="index.php?pagina=esqueceuSenha"><u>Esqueceu a senha?</u></a>
    </div>