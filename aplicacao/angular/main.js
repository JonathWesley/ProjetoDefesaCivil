var app = angular.module("myApp", []);

app.controller("myCtrl", function($scope){
    $scope.telefone = "(47) 3268-3133";
    $scope.endereco = "R. Pardal, 111 - Ariribá, Balneário Camboriú - SC";
    $scope.pesquisa = "";

    $scope.sel_endereco = {
        singleSelect: null,
        option1: 'Ocorrencia'
    };

    $scope.coordenada = function(){
        if(sel_endereco.singleSelect == 'Coordenada')
            return true;
        return false;
    }
});