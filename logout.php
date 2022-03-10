<?php
    setcookie ("login", "");
    echo "Sessão encerrada. Obrigado";
    header("refresh:3;url=index.php");
?>