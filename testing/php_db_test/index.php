<?php

include 'db.php';

include 'header.php';

if(isset($_GET['pagina'])){
    $pagina = $_GET['pagina'];
}else{
    $pagina = 'home';
}


if($pagina == 'cursos'){
    include 'view/cursos.php';
}elseif($pagina == 'alunos'){
    include 'view/alunos.php';
}elseif($pagina == 'matriculas'){
    include 'view/matriculas.php';
}else{
    include 'view/home.php';
}

include 'footer.php';
