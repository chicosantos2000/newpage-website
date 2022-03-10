<?php 
    include "sql_connect.php";

    $id=$_GET["id"];

    $sql="DELETE FROM noticia WHERE noticia_id=$id";

    if($ligacao->query($sql)===TRUE){
        echo "Noticia removida com sucesso";
        }else{
        echo "Não foi possivel apagar a noticia.";
        
    }
?>
<?php include "menunoticia.html" ?>