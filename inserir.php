<?php
// Configurações de conexão com o banco de dados
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'bombeirosbank';

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $periodoGestacao = mysqli_real_escape_string($conexao, $_POST['total']);
    $preNatal = isset($_POST['opcao1']) ? ($_POST['opcao1'] == 'sim' ? 1 : 0) : 0;
    $nomeMedico = isset($_POST['opcao1']) && $_POST['opcao1'] == 'sim' ? mysqli_real_escape_string($conexao, $_POST['textoAdicional1']) : '';
    $possibComplicacoes = isset($_POST['ad']) ? ($_POST['ad'] == 'sim' ? 1 : 0) : 0;
    $primeiroFilho = isset($_POST['opcao2']) ? ($_POST['opcao2'] == 'opcaoSim2' ? 1 : 0) : 0;
    $quantos = isset($_POST['opcao2']) && $_POST['opcao2'] == 'opcaoNao2' ? mysqli_real_escape_string($conexao, $_POST['textoAdicional2']) : '';
    $horasContracoes = mysqli_real_escape_string($conexao, $_POST['total']);
    $duracaoCont = mysqli_real_escape_string($conexao, $_POST['total']);
    $intervaloCont = mysqli_real_escape_string($conexao, $_POST['total']);
    $pressaoQuadril = isset($_POST['ad']) ? ($_POST['ad'] == 'sim' ? 1 : 0) : 0;
    $rupturaBolsa = isset($_POST['ad']) ? ($_POST['ad'] == 'sim' ? 1 : 0) : 0;
    $inspecaoVisual = isset($_POST['ad']) ? ($_POST['ad'] == 'sim' ? 1 : 0) : 0;
    $partoRealizado = isset($_POST['opcao3']) ? ($_POST['opcao3'] == 'opcaoSim3' ? 1 : 0) : 0;
    $horaNasc = isset($_POST['opcao3']) && $_POST['opcao3'] == 'opcaoSim3' ? mysqli_real_escape_string($conexao, $_POST['textoAdicional3']) : '';
    $sexoBebe = isset($_POST['ad']) ? ($_POST['ad'] == 'Feminino' ? 'Feminino' : 'Masculino') : '';
    $nomeBebe = mysqli_real_escape_string($conexao, $_POST['total']);

    $query = "INSERT INTO anamnese_gestacional (FK_IdOcorrencia, PeriodoGestacao, PreNatal, NomeMedico, PossibComplicacoes, PrimeiroFilho, Quantos, HorasContracoes, DuracaoCont, IntervaloCont, PressaoQuadril, RupturaBolsa, InspecaoVisual, PartoRealizado, HoraNasc, SexoBebe, NomeBebe) VALUES ('1', '$periodoGestacao', '$preNatal', '$nomeMedico', '$possibComplicacoes', '$primeiroFilho', '$quantos', '$horasContracoes', '$duracaoCont', '$intervaloCont', '$pressaoQuadril', '$rupturaBolsa', '$inspecaoVisual', '$partoRealizado', '$horaNasc', '$sexoBebe', '$nomeBebe')";

    if (mysqli_query($conexao, $query)) {
        echo "Dados inseridos com sucesso.";
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
?>