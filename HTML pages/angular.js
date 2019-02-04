var app = angular.module("myApp", []);

app.controller("myCtrl", function($scope){
    $scope.telefone = "(47) 3268-3133";
    $scope.endereco = "R. Pardal, 111 - Ariribá, Balneário Camboriú - SC";
    $scope.caminho = [{name:"Home", route:"main.html"}];

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
});