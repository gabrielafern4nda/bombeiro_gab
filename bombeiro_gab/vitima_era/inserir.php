<?php
include("conecta.php");

$ciclista = isset($_POST["ciclista"]) ? $_POST["ciclista"] : 0;
$condutorMoto = isset($_POST["condutorMoto"]) ? $_POST["condutorMoto"] : 0;
$condutorCarro = isset($_POST["condutorCarro"]) ? $_POST["condutorCarro"] : 0;
$clinico = isset($_POST["clinico"]) ? $_POST["clinico"] : 0;
$gestante = isset($_POST["gestante"]) ? $_POST["gestante"] : 0;
$trauma = isset($_POST["trauma"]) ? $_POST["trauma"] : 0;
$passageiroBancoFrente = isset($_POST["passageiroBancoFrente"]) ? $_POST["passageiroBancoFrente"] : 0;
$passageiroBancoTras = isset($_POST["passageiroBancoTras"]) ? $_POST["passageiroBancoTras"] : 0;
$passageiroMoto = isset($_POST["passageiroMoto"]) ? $_POST["passageiroMoto"] : 0;
$pedestre = isset($_POST["pedestre"]) ? $_POST["pedestre"] : 0;

$comando = $pdo->prepare("INSERT INTO vitima_era 
    (Ciclista, CondutorMoto, CondutorCarro, Clinico, Gestante, Trauma, PassageiroBancoFrente, PassageiroBancoTras, PassageiroMoto, Pedestre)
    VALUES (:ciclista, :condutorMoto, :condutorCarro, :clinico, :gestante, :trauma, :passageiroBancoFrente, :passageiroBancoTras, :passageiroMoto, :pedestre)");

$resultado = $comando->execute(array(
    ":ciclista" => $ciclista,
    ":condutorMoto" => $condutorMoto,
    ":condutorCarro" => $condutorCarro,
    ":clinico" => $clinico,
    ":gestante" => $gestante,
    ":trauma" => $trauma,
    ":passageiroBancoFrente" => $passageiroBancoFrente,
    ":passageiroBancoTras" => $passageiroBancoTras,
    ":passageiroMoto" => $passageiroMoto,
    ":pedestre" => $pedestre
));

echo json_encode(array("resultado" => $resultado ? 1 : 0));
?>