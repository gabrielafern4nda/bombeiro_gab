<?php
// Conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=localhost;dbname=bombeirosbank", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// Consulta SQL para obter dados dos usuários
$comando = $pdo->prepare("SELECT * FROM cadastro_bombeiro");
$comando->execute();

// Responder com os dados em formato JSON
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);
?>
