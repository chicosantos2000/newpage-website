            <!DOCTYPE html>
            <html lang="pt-pt">
              <head>
                <!-- Meta tags Obrigatórias -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
                       <!-- JavaScript (Opcional) -->
                <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
                  
                  
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
              </head>
             <div class ="container">
                  <div class="row">
                  <div class="row"> 
                    <div class="col-sm-8">
                      <h2>Noticias ao Minuto</h2>
                        <?php
                    include "sql_connect.php";

            $sql_p = "SELECT autor.autor_nome, categoria.categoria_nome, noticia.noticia_id, noticia.noticia_titulo, noticia.noticia_foto, noticia.noticia_intro FROM ((noticia INNER JOIN autor ON noticia.noticia_autor=autor.autor_id) INNER JOIN categoria ON noticia.noticia_cat=categoria.categoria_id)";

            $resultado_p = $ligacao->query($sql_p);
            if ($resultado_p->num_rows > 0)
            {
                while ($row = $resultado_p->fetch_assoc())
                {
                    echo "
                            <div class=\"card-deck\">
                            <div class=\"card\">
                            <h5> <div class=\"card-header\"> " . $row["noticia_titulo"] . "</div>  </h5>
                            <img class=\"card-img-top\" src=\"fotos/" . $row["noticia_foto"] . "\" width=75px>
                            <div class=\"card-body\">
                            <p class=\"card-text\"> " . $row["noticia_intro"] . "</p>
                            </div>
                            </div>
                            </div>
                             <p> </p>
                            <a href=\"detalhe.php?id=" . $row["noticia_id"] . "\" class=\"btn btn-primary\">Ler a noticia completa</a>
                            <p> </p>
                            <p> </p>
                            <p> </p>";

                }
            }
            else
            {
                echo "Sem Produtos na Tec Store";
            }
            ?> 
                        </div>




            <div class="col-sm-4"> 
            <h3>Categorias de Notícias</h3>
            <ul>
            <?php
            $sql_c = "SELECT * FROM categoria";
            $resultado_c = $ligacao->query($sql_c);

            if ($resultado_c->num_rows > 0)
            {
                while ($rowc = $resultado_c->fetch_assoc())
                {
                    echo "<li class=\"list-group-item\"> <a class=\"btn btn-success\" href=\"categoria.php?id=" . $rowc["categoria_id"] . "\">" . $rowc["categoria_nome"] . "</a></li>";
                }
            }
            ?>
            </ul>


            <h3> Autores de Notícias</h3>
            <ul class="list-group">
            <?php
            $sql_c = "SELECT * FROM autor";
            $resultado_c = $ligacao->query($sql_c);

            if ($resultado_c->num_rows > 0)
            {
            while ($rowc = $resultado_c->fetch_assoc())
            {
            echo "<li class=\"list-group-item\"> <a class=\"btn btn-warning\" href=\"autor.php?id=" . $rowc["autor_id"] . "\">" . $rowc["autor_nome"] . "</a></li>";
                }
            }
            else
            {
                echo "Sem autores";
            }
            ?>
            </ul>
            <p> </p>
            <p> </p>
                                          
                                          
            <?php
            if (isset($_COOKIE["login"]))
            {
                echo "<h3>Menu do Autor</h3>        <ul>    <li><a href=\"gnoticia.php\" class=\"btn btn-primary\">Gerir noticias</a></li> <p> </p> <p> </p> <li> <a href=\"formnoticia.php\" class=\"btn btn-primary\">Inserir Noticias</a></li> <p> </p> <p> </p> <li> <a href=\"logout.php\" class=\"btn btn-danger\">Sair</a> </li>  </ul>                             ";
            }
            else
            {
                echo "<h3> Login</h3>
                            <form method=\"post\" action=\"login.php\">
                <div class=\"form-group\">
                <label for=\"login\">Utilizador</label>
                <input type=\"text\" name=\"login\" class=\"form-control\" id=\"login\" placeholder=\"Insira o Login\">
                </div>
                <div class=\"form-group\">
                <label for=\"password\">Insira a sua Password</label>
                <input type=\"password\" name=\"password\" class=\"form-control\" id=\"password\" placeholder=\"Insira a sua Senha\">
                </div>
                    <input type=\"submit\" name =\"enviar\" class=\"btn btn-primary\"   value=\"enviar\">
              </form>";
            }

            ?>
                        </div>
                    </div>
                  </div>
