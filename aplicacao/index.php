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
    // if(isset($_GET['pagina'])){
    //     $pagina = $_GET['pagina'];
    // }else{
        $pagina = 'login';
    // }
}

if($pagina != 'login' && $pagina != 'esqueceuSenha'){
    if(isset($_SESSION['navegacao'])){
        array_push($_SESSION['navegacao'],$pagina,$pagina);
    }else{
        $_SESSION['navegacao'] = ['home','home'];
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