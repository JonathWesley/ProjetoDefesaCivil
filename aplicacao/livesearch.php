<?php
    include 'database.php';

    //get the q parameter from URL
    $q=$_GET["q"];
    $id_input="'".$_GET['id']."'";

    if(substr($_GET['id'],0,1) == "a"){
        $query = "SELECT nome from usuario WHERE nome ILIKE '$q%' LIMIT 5";
    }else{
        $query = "SELECT nome from pessoa WHERE nome ILIKE '$q%' LIMIT 5";
    }

    $result = pg_query($connection, $query);

    $hint = "";
    $i=0;
    while($linha = pg_fetch_array($result, $i)){
        $hint = $hint.'<input type="button" class="autocompleteBtn" value="'.$linha['nome'].'" onclick="selecionaComplete(this.value,'.$id_input.')"><br>';
        $i++;
    }

    // Set output to "no suggestion" if no hint was found
    // or to the correct values
    if ($hint=="") {
        if(substr($_GET['id'],0,1) == "a"){
            $response="Usuário não encontrado.";
        }else{
            $response="Pessoa não encontrada.";
        }
        
    } else {
        $response=$hint;
    }

    //output the response
    echo $response;
?>