var scotchApp = angular.module('my-app', ['ngRoute']);

scotchApp.config(function($routeProvider){
    $routeProvider
        .when('/',{
            templateUrl : '/login.html',
            controller  : 'mainController'
        })
        .when('/cadastroOcorrencia', {
            templateUrl : 'pages/cadastroOcorrencia.html',
            controller : 'cadastroOcorrencia'
        })
        .when('/cadastroUsuario', {
            templateUrl : 'pages/cadastroUsuario.html',
            controller : 'cadastroUsuario'
        })
        .when('/consultarOcorrencia', {
            templateUrl : 'pages/consultarOcorrencia.html',
            controller : 'consultarOcorrencia'
        })
        .when('/consultarUsuario', {
            templateUrl : 'pages/consultarUsuario.html',
            controller : 'consultarUsuario'
        })
        .when('/esqueceuSenha', {
            templateUrl : 'pages/esqueceuSenha.html',
            controller : 'esqueceuSenha'
        })
        .when('/exibirOcorrencia', {
            templateUrl : 'pages/exibirOcorrencia.html',
            controller : 'exibirOcorrencia'
        })
        .when('/exibirUsuario', {
            templateUrl : 'exibirUsuario.html',
            controller : 'exibirUsuario.html'
        })
        .when('/listarOcorrencias', {
            templateUrl : 'listarOcorrencias.html',
            controller : 'listarOcorrencias'
        })
        .when('/home',{
            templateUrl : 'pages/home.html',
            controller  : 'homeController'
        })
        .when('/perfil', {
            templateUrl : 'pages/perfil.html',
            controller  : 'perfilController'
        })
        .when('/previewOcorrencia', {
            templateUrl : 'pages/previewOcorrencia.html',
            controller : 'previewOcorrencia'
        });
    });