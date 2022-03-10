<?php 
    include "sql_connect.php";
 
    
    $titulo = $_POST["titulo"];
    $intro = $_POST["intro"];
    $desenv = $_POST["desenv"];
    $data = $_POST["data"];
     

    $sql = "INSERT into noticia (noticia_titulo, noticia_intro, noticia_desenv, noticia_data) values ('$titulo', ' $intro', ' $desenv', '$data')"; 

    if ($ligacao->query ($sql) === TRUE)
    {
       echo "<p> Dados inseridos: $titulo | $intro | $desenv | $data </p>";  
        
    } else {
        echo "<p> Erro! Os dados: $titulo | $intro | $desenv | $data   não foram inseridos! </p>" . $ligacao->error;
        }

?>


