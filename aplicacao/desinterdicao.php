<?php
    include 'database.php';

    $id_interdicao = $_POST['id_interdicao'];
    $id_ocorrencia = $_POST['id_ocorrencia'];

    $query = "UPDATE interdicao SET interdicao_ativa=false WHERE id_interdicao = $id_interdicao";

    $result = pg_query($connection, $query) or die (pg_last_error());
    
    if($result)
        header('location:index.php?pagina=exibirOcorrencia&id='.$id_ocorrencia.'&sucessoInterdicao');
    else
        header('location:index.php?pagina=exibirInterdicao&id='.$id_interdicao.'&errorDB');