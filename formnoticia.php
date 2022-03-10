<!DOCTYPE html>

<!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <meta charset = "utf-8">
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<html>
<head>
    

    
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
    <title> Formulário</title>
</head>
    
            <body>
             
    
   
    <div class="container-fluid"> 
        
<?php 

    include ("sql_connect.php");
    if(isset($_FILES['noticia_foto'])){
    $extensao = strtolower(substr($_FILES['noticia_foto']['name'],-4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "fotos/";
    
   
    move_uploaded_file($_FILES['noticia_foto']['tmp_name'], $diretorio.$novo_nome);
    
    $id =$_POST["id"];
    $titulo = $_POST["titulo"];
    $cat = $_POST["cat"];
    $intro = $_POST["intro"];
    $desenv = $_POST["desenv"];
    $data = $_POST["data"];
    $foto = $_POST["foto"]; 
    

    $sql = "INSERT into noticia (noticia_titulo, noticia_cat, noticia_intro, noticia_desenv, noticia_data, noticia_foto, noticia_id) values ('$titulo', '$cat',  ' $intro', ' $desenv', '$data', '$foto', '$id'
    )"; 

    mysqli_query($ligacao,$sql);
    echo mysqli_error($ligacao);
    }
    ?>

    <form method="post" action="inserir.php">
       
        <p> <label>Titulo da Noticia</label> <input type ="text" name="titulo"> </p>
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
            
            
        <p> <label>Introdução </label> <input class="form-control" type="text" name="intro"> </p>
        
        <p> <label>Desenvolvimento </label> <input class="form-control" type="text" name="desenv"> </p>
        
        <p> <label>Data </label> <input class="form-control"  type="date" name="data"> </p>
        <p> <label> Fotografia</label> <input type="file" name="foto" required> </p>
            
            
            
          <p> <input type="submit" value="Enviar"> </p>
        </form>
        </div>
    </body>
</html>

 