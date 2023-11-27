<?php
// Conectar ao banco de dados e recuperar os dados da tabela selecionada
// Substitua as credenciais do banco de dados conforme necessário

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bombeirosbank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o parâmetro 'table' foi passado na URL
if (isset($_GET['table'])) {
    $tableName = $_GET['table'];

    // Consulta SQL para obter os dados da tabela selecionada
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados da Tabela <?php echo $tableName; ?></title>
    <style>
        /* Adicione seu estilo CSS aqui */
    </style>
</head>
<body>
    <h2>Dados da Tabela <?php echo $tableName; ?></h2>
    <table border="1">
        <tr>
            <!-- Adicione cabeçalhos de coluna dinamicamente com base nas colunas da tabela -->
            <?php
            $columns = $result->fetch_fields();
            foreach ($columns as $column) {
                echo "<th>" . $column->name . "</th>";
            }
            ?>
        </tr>
        <?php
       if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            
            // Exibir os dados da linha em modo de visualização
            foreach ($row as $key => $value) {
                echo "<td><span class='view-mode'>" . ($value ?? 'N/A') . "</span><input class='edit-mode' type='text' value='" . ($value ?? '') . "'></td>";
            }
    
            // Adicionar botões para editar e salvar para cada linha
            echo "<td><button onclick='toggleEditMode(this.parentNode.parentNode)'>Editar</button><button class='edit-mode' onclick='toggleEditMode(this.parentNode.parentNode)'>Salvar</button></td>";
    
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='" . (count($columns) + 1) . "'>Nenhum dado encontrado na tabela</td></tr>";
    }
    
    $conn->close();
    ?>
    </table>
</body>
</html>

<?php
} else {
    // Redirecionar de volta para a página de listagem se o parâmetro 'table' não estiver presente
    header("Location: read.php");
    exit();
}
?>