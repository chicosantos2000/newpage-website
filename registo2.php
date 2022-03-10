<?php 

$login = $_POST["login"];
$pass = MD5($_POST["password"]);

include "sql_connect.php";

$sql_verifica="SELECT autor_login FROM autor WHERE autor_login='$login'";
$resultado_verifica = $ligacao->query  ($sql_verifica);

    if($resultado_verifica->num_rows > 0) {
        echo"utilizador $login já existe";
        header ("refresh:3;url=registo.php");
        die();
    }else{
     
        $sql_insere="INSERT INTO autor (autor_login, autor_passe) VALUES ('$login', '$pass')";
        $insere = $ligacao->query($sql_insere);
        
        if (!$insere){
            echo "Falha ao fazer o registo " . $ligacao->error;
            }else{
            echo "Utilizador registado com sucesso, já consegue publica editar e apagar as suas notícias!";
            header ("refresh:3;url=index.php");
        }
    }


?> 