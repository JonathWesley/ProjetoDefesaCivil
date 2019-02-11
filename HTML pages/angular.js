var app = angular.module("myApp", []);

app.controller("myCtrl", function($scope){
    $scope.usuario = "";
    $scope.senha = "";
    $scope.nivel = "";
    $scope.telefone = "(47) 3268-3133";
    $scope.endereco = "R. Pardal, 111 - Ariribá, Balneário Camboriú - SC";
    $scope.pesquisa = "";
    $scope.caminho = [{name:"Home", route:"main.html"}];
    $scope.ocorrencia = {id:"", endPrin:"", coordPrin:"", endNum:"", endRef:"", agtPrin:"", 
    agtApoio1:"", agtApoio2:"", ocorRet:"", codRef:"", dataLan:"", dataOcor:"", descricao:"",
    origem:"", pessoaAtd1:"", pessoaAtd2:"", cobrade:"", naturezaOcor:"", fotos:"", 
    prioridade:"", analisado:"", congelado:"", encerrado:""};
    $scope.ocorrencias = [{id:"1111", cobrade:"Enchente", prioridade:"Alta"}, {id:"2222", cobrade:"Deslizamento", prioridade:"Média"}];
    $scope.usuarios = [{codPessoa:"1111", nome:"João da Silva"}, {codPessoa:"2222", nome:"Maria Cunha"}];

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
            alert(localStorage.length);
            alert("Usuário ou senha errados");
        }
    };
    $scope.esqueceuSenha = function(){
        window.location = "esqueceuSenha.html";
    };
    $scope.trocarSenha = function(){
        alert("Solicitação foi enviada ao seu email!");
        window.location = "index.html";
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
    $scope.exibirUsuario = function(){
        window.location = "exibirUsuario.html";
    };
    $scope.verificaNivel = function(){
        $scope.nivel = localStorage.getItem('nivel');
        return $scope.nivel;
    };
    $scope.cadastrarOcorrencia = function(){
        if(typeof(Storage) !== undefined){
            $scope.ocorrencias = sessionStorage.getItem('ocorrencias');
        }
        $scope.ocorrencias.push($scope.ocorrencia);
        sessionStorage.setItem('ocorrencias', $scope.ocorrencias);
        alert(sessionStorage.getItem(ocorrencias));
    };
    $scope.carregarOcorrencias = function(){
        if(typeof(Storage) !== undefined){
            $scope.ocorrencias = sessionStorage.getItem('ocorrencias');
        }
    };
    $scope.edit = function(){
        alert('editando');
    };
});