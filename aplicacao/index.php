<?php
session_start();
include 'database.php';

//echo pg_last_error();

if($_SESSION['login']){
    $pagina = $_GET['pagina'];
}else{
    if($_GET['pagina'] == 'esqueceuSenha')
        $pagina = 'esqueceuSenha';
    else
        $pagina = 'login';
}

if($pagina != 'login' && $pagina != 'esqueceuSenha')
    include 'header.php';

if($_SESSION['nivel_acesso'] == 1){ //diretor
    switch($pagina){
        case 'esqueceuSenha': include 'view/esqueceuSenha.php'; break;
        case 'cadastrarOcorrencia': include 'view/cadastrarOcorrencia.php'; break;
        case 'cadastrarUsuario': include 'view/cadastrarUsuario.php'; break; 
        case 'consultarUsuario': include 'view/consultarUsuario.php'; break; 
        case 'perfil': include 'view/perfil.php'; break;
        case 'exibirOcorrencia': include 'view/exibirOcorrencia.php'; break;
        case 'exibirUsuario': include 'view/exibirUsuario.php'; break;
        case 'editarOcorrencia' : include 'view/editarOcorrencia.php'; break;
        case 'cadastrarChamado' : include 'view/cadastrarChamado.php'; break;
        case 'consultarChamado' : include 'view/consultarChamado.php'; break;
        case 'exibirChamado' : include 'view/exibirChamado.php'; break;
        case 'exibirPessoa' : include 'view/exibirPessoa.php'; break;
        case 'cadastrarInterdicao' : include 'view/cadastrarInterdicao.php'; break;
        case 'exibirInterdicao' : include 'view/exibirInterdicao.php'; break;
        case 'visualizarSensores' : include 'view/visualizarSensores.php'; break;
        default: include 'view/consultarOcorrencia.php'; break;
    }
}else if($_SESSION['nivel_acesso'] == 2){ //coordenador
    switch($pagina){
        case 'esqueceuSenha': include 'view/esqueceuSenha.php'; break;
        case 'cadastrarOcorrencia': include 'view/cadastrarOcorrencia.php'; break;
        case 'perfil': include 'view/perfil.php'; break;
        case 'exibirOcorrencia': include 'view/exibirOcorrencia.php'; break;
        case 'editarOcorrencia' : include 'view/editarOcorrencia.php'; break;
        case 'cadastrarChamado' : include 'view/cadastrarChamado.php'; break;
        case 'consultarChamado' : include 'view/consultarChamado.php'; break;
        case 'exibirChamado' : include 'view/exibirChamado.php'; break;
        case 'exibirPessoa' : include 'view/exibirPessoa.php'; break;
        case 'cadastrarInterdicao' : include 'view/cadastrarInterdicao.php'; break;
        case 'exibirInterdicao' : include 'view/exibirInterdicao.php'; break;
        case 'visualizarSensores' : include 'view/visualizarSensores.php'; break;
        default: include 'view/consultarOcorrencia.php'; break;
    }
}else if($_SESSION['nivel_acesso'] == 3){ //agente
    switch($pagina){
        case 'esqueceuSenha': include 'view/esqueceuSenha.php'; break;
        case 'cadastrarOcorrencia': include 'view/cadastrarOcorrencia.php'; break;
        case 'perfil': include 'view/perfil.php'; break;
        case 'exibirOcorrencia': include 'view/exibirOcorrencia.php'; break;
        case 'editarOcorrencia' : include 'view/editarOcorrencia.php'; break;
        case 'cadastrarChamado' : include 'view/cadastrarChamado.php'; break;
        case 'consultarChamado' : include 'view/consultarChamado.php'; break;
        case 'exibirChamado' : include 'view/exibirChamado.php'; break;
        case 'exibirPessoa' : include 'view/exibirPessoa.php'; break;
        case 'cadastrarInterdicao' : include 'view/cadastrarInterdicao.php'; break;
        case 'exibirInterdicao' : include 'view/exibirInterdicao.php'; break;
        case 'visualizarSensores' : include 'view/visualizarSensores.php'; break;
        default: include 'view/consultarOcorrencia.php'; break;
    }
}else{
    switch($pagina){
        case 'esqueceuSenha': include 'view/esqueceuSenha.php'; break;
        default: include 'view/login.php'; break;
    }
}

include 'footer.php';