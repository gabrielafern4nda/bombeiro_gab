<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexão com o banco de dados
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=bombeirosbank", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }

    // Obter CPF a ser excluído
    $cpf_excluir = $_POST["cpf_excluir"];

    // Excluir no banco de dados
    $comando = $pdo->prepare("DELETE FROM cadastro_bombeiro WHERE CPF = ?");
    $resultado = $comando->execute([$cpf_excluir]);

    // Responder com um JSON indicando o resultado da operação
    echo json_encode(["resultado" => ($resultado ? 1 : 0)]);
}
?>