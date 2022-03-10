<?php
include "sql_connect.php";

    $id = $_GET["id"];
    $titulo = $_POST["titulo"];
    $cat = $_POST["cat"];
    $intro = $_POST["intro"];
    $desenv = $_POST["desenv"];
    $data = $_POST["data"]; 
  

$sql = "UPDATE noticia SET noticia_titulo='$titulo', noticia_cat='$cat', noticia_intro='$intro', noticia_desenv='$desenv', noticia_data='$data' WHERE noticia_id ='$id'";

if ($ligacao->query ($sql) === TRUE) {
    echo "Registo atualizado com sucesso!";
}else {
    echo "Error:" . $ligacao->error;
}
?> 