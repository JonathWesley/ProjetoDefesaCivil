var app = angular.module("myApp", []);

app.controller("myCtrl", function($scope){
    $scope.usuario = "";
    $scope.senha = "";
    $scope.nivel = "";
    $scope.telefone = "(47) 3268-3133";
    $scope.endereco = "R. Pardal, 111 - Ariribá, Balneário Camboriú - SC";
    $scope.pesquisa = "";
    $scope.caminho = [{name:"Home", route:"main.html"}];
    //$scope.ocorrencias = [{id:int,cobrade:string, prioridade:string}];
    $scope.ocorrencia = {id:"", endPrin:"", coordPrin:"", endNum:"", endRef:"", agtPrin:"", 
    agtApoio1:"", agtApoio2:"", ocorRet:"", codRef:"", dataLan:"", dataOcor:"", descricao:"",
    origem:"", pessoaAtd1:"", pessoaAtd2:"", cobrade:"", naturezaOcor:"", fotos:"", 
    prioridade:"", analisado:"", congelado:"", encerrado:""};

    $scope.login = function(){
        if($scope.usuario=="admin" && $scope.senha=="senha"){
            $scope.nivel = "admin";
            window.location = "main.html";
            localStorage.setItem('nivel', $scope.nivel);
        }else if($scope.usuario=="usuario" && $scope.senha=="senha"){
            $scope.nivel = "usuario";
            window.location = "main.html";
            localStorage.setItem('nivel', $scope.nivel);
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
    $scope.verificaNivel = function(){
        $scope.nivel = localStorage.getItem('nivel');
        return $scope.nivel;
    };
    $scope.cadastrarOcorrencia = function(){
        alert(localStorage.length);
        var ocorrencias = [];
        if(localStorage.length > 0){
            ocorrencias = localStorage.getItem('ocorrencias');
        }
        ocorrencias[ocorrencias.length] = $scope.ocorrencia;
        localStorage.setItem('ocorrencias', ocorrencias);
        alert(ocorrencias.length);
    };
    $scope.carregarOcorrencias = function(){
        
    };
    $scope.edit = function(){
        alert('editando');
    };
});