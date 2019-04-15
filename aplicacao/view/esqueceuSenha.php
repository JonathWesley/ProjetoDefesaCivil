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
        <div class="container img-box">
        <div class="jumbotron">
            <img src="images/logo.jpg" alt="DefesaCivil" class="img-rounded corner-img">
        </div>
        </div>
        <h1 class="text-center page-title">Defesa Civil</h1>
    </header>
        
    <div class="container login-box">
        <div class="jumbotron">
            <h4>Digite seu email:</h4>
            <form>
            <div class="input-group">
                <input id="email" type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <button class="btn btn-default btn-md" id="loginButton">Entrar</button>
            </form>
        </div>
    </div>