<?php
require "../conexao.php";
$timezone = new DateTimeZone('America/Sao_Paulo');
$agora = new DateTime('now', $timezone);
$data_atual = $agora->format('Y-m-d');
$hora_atual = $agora->format('H-i');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar os valores do formulário
    $paciente = $_POST['nome'];
    $cpf_paciente = $_POST['cpf'];
    $cpf_medico = $_POST['profissional'];
    $

    $sql = "INSERT INTO tb_atendimento (
    paciente,cpf_cns ,cpf_medico,estado_atendimento, data_atual, hora_atual
    ) VALUES (
        '$paciente',
        '$cpf_paciente', 
        '$cpf_medico',
        '$data_atual',
        '$hora_atual',
        1
    )";
    if ($stmt = $conn->prepare($sql)) {
    if ($stmt->execute()) {
        ?>
        <script>
            window.alert("Dados Inseridos com Sucesso");
            window.location.href = "index.php";
        </script>
    <?php
     } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }
    } else {
        echo "Erro na preparação da query: " . $conn->error;
    }
}
?>
