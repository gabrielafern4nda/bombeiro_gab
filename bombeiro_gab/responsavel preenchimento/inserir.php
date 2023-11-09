<?php

$total = $_POST["total"];


    include("conecta.php");

        $comando = $pdo->prepare("INSERT INTO responsavel VALUES (\"$total\")");

        $resultado = $comando->execute();
    echo("{\"resultado\":1}"); 

?>