<?php

$total = $_POST["total"];


include("conecta.php");

    $comando = $pdo->prepare("INSERT INTO responsavel(preenchimento) VALUES (\"$total\")");

    $resultado = $comando->execute();
echo("{\"resultado\":1}"); 

?>