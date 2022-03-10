<?php 


$servidor = "Localhost";
$utilizador = "root";
$password = "";
$bd = "jornal";

$ligacao = mysqli_connect($servidor, $utilizador, $password, $bd);

if (!$ligacao) {
    die("<p style =\"color:red;\">Erro na Ligação á Base de Dados:". $ligacao->mysqli_connect_error() . "</p>");
}

?>