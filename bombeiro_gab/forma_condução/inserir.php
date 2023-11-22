<?php
    include("conecta.php");
    $FK_IdOcorrencia = 21; //$_SESSION["id"];

    $Deitada  = $_POST["Deitada"];
    $SemiSentada  = $_POST["SemiSentada"];
    $Sentada  = $_POST["Sentada"];

    $comando = $pdo->prepare("INSERT INTO forma_conducao VALUES ($FK_IdOcorrencia, $Deitada , $SemiSentada, $Sentada)");
    $resultado = $comando->execute();

    echo ("{\"resposta\":1}");

?>