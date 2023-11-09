<?php
include("conecta.php");

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os valores do formulário
    $ciclista = $_POST["Ciclista"];
    $condutorMoto = $_POST["CondutorMoto"];
    $condutorCarro = $_POST["CondutorCarro"];
    $clinico = $_POST["Clinico"];
    $gestante = $_POST["Gestante"];
    $trauma = $_POST["Trauma"];
    $passageiroBancoFrente = $_POST["PassageiroBancoFrente"];
    $passageiroBancoTras = $_POST["PassageiroBancoTras"];
    $passageiroMoto = $_POST["PassageiroMoto"];
    $pedestre = $_POST["Pedestre"];
    // Adicione as demais variáveis conforme as colunas no banco

    // Prepara a consulta SQL
    $comando = $pdo->prepare("INSERT INTO vitima_era (Ciclista, CondutorMoto, CondutorCarro, Clinico, Gestante, Trauma, PassageiroBancoFrente, PassageiroBancoTras, PassageiroMoto, Pedestre) VALUES (:ciclista, :condutorMoto)");
    // Adicione os demais campos e valores na consulta conforme as colunas no banco

    // Executa a consulta
    $resultado = $comando->execute(array(":ciclista" => $ciclista, ":condutorMoto" => $condutorMoto));
    // Adicione os demais campos e valores na execução conforme as colunas no banco

    // Verifica se a inserção foi bem sucedida
    if ($resultado) {
        echo json_encode(array("resultado" => 1));
    } else {
        echo json_encode(array("resultado" => 0));
    }
} else {
    echo json_encode(array("resultado" => 0));
}
?>
