<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexão com o banco de dados
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=bombeirosbank", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }

    // Obter dados do formulário
    $cpf_alterar = $_POST["cpf_alterar"];
    $novo_cpf = $_POST["novo_cpf"];
    $novo_email = $_POST["novo_email"];
    $nova_senha = md5($_POST["nova_senha"]);
    $novo_nome = $_POST["novo_nome"];
    $novo_telefone = $_POST["novo_telefone"];
    $novo_usuario = $_POST["novo_usuario"];

    // Alterar no banco de dados
    $comando = $pdo->prepare("UPDATE cadastro_bombeiro SET Email = ?, CPF = ?, Senha = ?, Nome = ?, Telefone = ?, Usuario = ? WHERE CPF = ?");
    $resultado = $comando->execute([$novo_email, $novo_cpf, $nova_senha, $novo_nome, $novo_telefone, $novo_usuario, $cpf_alterar]);

    // Responder com um JSON indicando o resultado da operação
    echo json_encode(["resultado" => ($resultado ? 1 : 0)]);
}
?>
