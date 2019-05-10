<?php
session_start();
include 'database.php';

if($_SESSION['login']){
    if(isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
    }else{
        $pagina = 'home';
    }
}else{
    $pagina = 'login';
}

$nomePagina = '';
switch($pagina){
    case 'cadastrarOcorrencia': $nomePagina = 'Cadastrar Ocorrencia'; break; 
    case 'consultarOcorrencia': $nomePagina = 'Consultar Ocorrencia'; break; 
    case 'cadastrarUsuario': $nomePagina = 'Cadastrar Usuario'; break; 
    case 'consultarUsuario': $nomePagina = 'Consultar Usuario'; break; 
    case 'perfil': $nomePagina = 'Perfil'; break;
    default: $nomePagina = 'Home'; break;
}

if($pagina != 'login' && $pagina != 'esqueceuSenha'){
    if(isset($_SESSION['navegacao'])){
        if(array_search($nomePagina, $_SESSION['navegacao']) != false){
            $i = array_search($nomePagina, $_SESSION['navegacao']);
            array_splice($_SESSION['navegacao'], $i, 2);
        }
        while(sizeof($_SESSION['navegacao']) > 8){
            array_shift($_SESSION['navegacao']);
            array_shift($_SESSION['navegacao']);
        }
        array_push($_SESSION['navegacao'],$nomePagina,$pagina);
    }else{
        $_SESSION['navegacao'] = ['Home','home'];
    }

    include 'header.php';
}

switch($pagina){
    case 'esqueceuSenha': include 'view/esqueceuSenha.php'; break;
    case 'home': include 'view/home.php'; break; 
    case 'cadastrarOcorrencia': include 'view/cadastrarOcorrencia.php'; break; 
    case 'consultarOcorrencia': include 'view/consultarOcorrencia.php'; break; 
    case 'cadastrarUsuario': include 'view/cadastrarUsuario.php'; break; 
    case 'consultarUsuario': include 'view/consultarUsuario.php'; break; 
    case 'perfil': include 'view/perfil.php'; break;
    default: include 'view/login.php'; break;
}

include 'footer.php';