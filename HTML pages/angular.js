var app = angular.module("myApp", []);

app.controller("myCtrl", function($scope){
    $scope.telefone = "(47) 3268-3133";
    $scope.endereco = "R. Pardal, 111 - Ariribá, Balneário Camboriú - SC";
    $scope.pesquisa = "";
    $scope.show = false;
    $scope.caminho = [{name:"Home", route:"main.html"}];
    $scope.ocorrencias = [{id:"11111", cobrade:"Deslizamento", prioridade:"Alta"}, 
                          {id:"22222", cobrade:"Enchente", prioridade:"Média"},
                          {id:"33333", cobrade:"Incendio", prioridade:"Alta"}];

    $scope.login = function(){
        window.location = "main.html";
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
    }
    $scope.exibirOcorrencia = function(){
        window.location = "exibirOcorrencia.html";
    }
});