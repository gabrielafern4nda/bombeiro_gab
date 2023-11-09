<?php

$nivel = $_POST["nivel"];

    include("conecta.php");

        $comando = $pdo->prepare("INSERT INTO av_paciente (Maiores5, Menores5) VALUES (\"$nivel\")");

        $resultado = $comando->execute();
    echo("{\"resultado\":1}"); 

?>