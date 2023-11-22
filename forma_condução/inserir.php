<?php
    include("conecta.php");
    $FK_IdOcorrencia = 3; //$_SESSION["id"];

    $Deitada = isset($_POST["Deitada"]) ? $_POST["Deitada"] : null;
    $SemiSentada = isset($_POST["SemiSentada"]) ? $_POST["SemiSentada"] : null;
    $Sentada = isset($_POST["Sentada"]) ? $_POST["Sentada"] : null;

    $comando = $pdo->prepare("INSERT INTO forma_conducao (FK_IdOcorrencia, Deitada, SemiSentada, Sentada) VALUES (:FK_IdOcorrencia, :Deitada, :SemiSentada, :Sentada)");
    $comando->bindParam(':FK_IdOcorrencia', $FK_IdOcorrencia);
    $comando->bindParam(':Deitada', $Deitada);
    $comando->bindParam(':SemiSentada', $SemiSentada);
    $comando->bindParam(':Sentada', $Sentada);

    
    $resultado = $comando->execute();

    echo "{\"resposta\":1}";
?>
