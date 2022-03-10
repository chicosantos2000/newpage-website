<?php 
    include "sql_connect.php";

    $id=$_GET["id"];
    

    $sql = "SELECT * FROM noticia WHERE noticia=$id";
    $resultado = mysqli_query($ligacao, $sql);
    
    if(mysqli_num_rows($resultado) > 0){
     while ($row=mysqli_fetch_assoc($resultado)){
         echo "<p>Deseja realmente apagar esta noticia?  " . $row["noticia_titulo"] . "?</p>";
         echo "<p> <a href=\"apagarnoticia.php?id=$id\">SIM!</a> | <a href=\"gnoticia.php?id\">NÃO!</a></p>";
        
          }
      }
?>          
<?php include "menuprodutos.html" ?>
