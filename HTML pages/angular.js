var app = angular.module("myApp", []);

app.controller("myCtrl", function($scope){
    $scope.usuario = "";
    $scope.senha = "";
    $scope.nivel = "";
    $scope.telefone = "(47) 3268-3133";
    $scope.endereco = "R. Pardal, 111 - Ariribá, Balneário Camboriú - SC";
    $scope.pesquisa = "";
    $scope.caminho = [{name:"Home", route:"main.html"}];
    $scope.ocorrencias = [{id:"11111", cobrade:"Deslizamento", prioridade:"Alta"}, 
                          {id:"22222", cobrade:"Enchente", prioridade:"Média"},
                          {id:"33333", cobrade:"Incendio", prioridade:"Alta"}];

    $scope.login = function(){
        if($scope.usuario=="admin" && $scope.senha=="senha"){
            $scope.nivel = "admin";
            window.location = "main.html";
            alert("admin");
        }else if($scope.usuario=="usuario" && $scope.senha=="senha"){
            $scope.nivel = "usuario";
            window.location = "main.html";
            alert("usuario");
        }else{
            alert("Usuário ou senha errados");
        }
    };
    $scope.changePassword = function(){
        alert('trocar a senha!');
    };
    $scope.addWay = function(x, y){
        var a = [{name: x, route: y}];
        $scope.caminho.push(a);
    };
    $scope.perfil = function(){
        window.location = "perfil.html";
    };
    $scope.exibirOcorrencia = function(){
        window.location = "exibirOcorrencia.html";
    };
});