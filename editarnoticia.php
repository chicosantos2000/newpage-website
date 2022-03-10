<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Jornal de Noticias</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Página Inicial <span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categorias de Noticias
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="categoria.php?id=1">Desporto</a>
          <a class="dropdown-item" href="categoria.php?id=2">Política</a>
          <a class="dropdown-item" href="categoria.php?id=3">Sociedade</a>
        </div>
      </li>
    </ul>
    </div>
    </nav>
   <title>Jornal de Noticias</title>               

                





<?php 
include "sql_connect.php";

$id = $_GET["id"];
$sql = "SELECT * FROM noticia WHERE noticia_id=$id";
$resultado = mysqli_query($ligacao, $sql);

if (mysqli_num_rows($resultado)>0){
    
    while ($row = mysqli_fetch_assoc($resultado)){
    $id = $row["noticia_id"];
    $titulo = $row["noticia_titulo"];
    $cat = $row["noticia_cat"];
    $intro = $row["noticia_intro"];
    $desenv = $row["noticia_desenv"];
    $data = $row["noticia_data"];
    $foto = $row["noticia_foto"];    
}
}

else {
    echo "sem resultados";
    
}
?> 

            <!DOCTYPE html>
            <html>
                <head>
            <title> Formulário</title>
                    <meta charset = "utf-8">
            </head>
                
                
            <body>
        
                <form method="post" action="editarnoticia2.php?id=<?php echo $id;?>">
                    <div class="form-group">
                <p> <label> Titulo</label> <input class="form-control"  type ="text" name="titulo" value="<?php echo $titulo; ?>"> </p>
             
                <p> <label>Categoria </label>
                <select id="categoria" name="cat"> 
                <?php 
                    include "sql_connect.php";
                    $sql= "SELECT * FROM categoria"; 
                    $resultado=$ligacao->query($sql);

                    if($resultado->num_rows > 0){
                        while($row = $resultado->fetch_assoc()){
                            echo "<option value=\"" . $row["categoria_id"] . "\">" . $row["categoria_nome"] . "</option>";
                        }
                        }
                   ?>
            </select></p>
                     
                <p> <label> Introdução</label> <input class="form-control"  type ="text" name="intro" value="<?php echo $intro; ?>"> </p>
                     
                <p> <label> Desenvolvimento</label> <input class="form-control"  type ="text" name="desenv" value="<?php echo $desenv; ?>"> </p>
                     
                <p> <label> Data</label> <input class="form-control"  type ="date" name="data" value="<?php echo $data; ?>"> </p>
                        </div> 
        
          
            <p> <a class="btn btn-primary"  href="fotos.php?id= <?php echo $id; ?>"> Editar foto </a></p>

        <p> <input class="btn btn-info" type="submit" value="Enviar"> </p>
        <p><a class="btn btn-danger" href="confirmanoticia.php?id=<?php echo $id; ?>"> Apagar </a></p> 
                </form>

      
     </body>