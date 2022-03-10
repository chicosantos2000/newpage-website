<?php 
$id = $_GET["id"];
include ("sql_connect.php");
    
if(isset($_FILES['ficheiro'])){
    $extensao = strtolower(substr($_FILES['ficheiro']['name'],-4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "fotos/";
    header('refresh: 3; url=index.php');
    move_uploaded_file($_FILES['ficheiro']['tmp_name'], $diretorio.$novo_nome);
    
    $sql = "UPDATE noticia SET noticia_foto='$novo_nome' WHERE noticia_id='$id'";
    
    mysqli_query($ligacao,$sql);
    echo mysqli_error($ligacao);
    }

?>


<form action="fotos.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">       
        <p> <label> Fotografia</label> <input type="file" name="ficheiro" required> </p>
        <p> <input type="submit" value="Enviar "> </p>

</form>

<?php?>