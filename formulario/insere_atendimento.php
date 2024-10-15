<?php
require_once("conexao.php");
session_start();
date_default_timezone_set('American/Sao_paulo');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar os valores do formulário
    $data_inicio = $_POST['data_inicio'];
    $competencia = $_POST['competencia'];
    $origem_paciente = strtoupper($_POST['origem_paciente']);
    $cnes = $_POST['cnes'];
    $n_autorizacao = $_POST['n_autorizacao'];
    $alcool_drogas = strtoupper($_POST['alcool_drogas']);
    $outros = strtoupper($_POST['outros']);
    $cid_principal = strtoupper($_POST['descricao']);
    $causas_assoc = strtoupper($_POST['causas_assoc']);
    $cobertura_esf = strtoupper($_POST['cobertura_esf']);
    $destino_paciente = strtoupper($_POST['destino_paciente']);
    $data_fim = $_POST['data_fim'];
    $id_usuarios = $_POST['paciente'];
    $hora = date("H:i:s");
    $status = 1;

    $sql = "INSERT INTO dados_atendimento (
    data_inicio, competencia, origem_paciente, cnes,
    n_autorizacao, alcool_drogas,outros, cid_principal, causas_assoc,
    cobertura_esf, destino_paciente, data_fim, id_usuarios,hora,status  
    ) VALUES (
        '$data_inicio',
        '$competencia', 
        '$origem_paciente',
        '$cnes',
        '$n_autorizacao',
        '$alcool_drogas',
        '$outros', 
        '$cid_principal',
        '$causas_assoc',
        '$cobertura_esf', 
        '$destino_paciente',
        '$data_fim',
        '$id_usuarios',
        '$hora',
        '$status'

    )";

if ($stmt = $conn->prepare($sql)) {
    if ($stmt->execute()) {
        $id_atendimento = $conn->lastInsertId();
            if(isset($_SESSION['admin'])){
                ?>
                <script>
                    window.alert("Dados Inseridos com Sucesso");
                    window.location.href = "../admin/acoes_realizadas.php?id=<?php echo $id_atendimento; ?>index.php";
                </script>
            <?php
            } elseif(isset($_SESSION['recepcao'])){
                ?>
                <script>
                    window.alert("Dados Inseridos com Sucesso");
                    window.location.href = "../recepcao/acoes_realizadas.php?id=<?php echo $id_atendimento; ?>";
                </script>
            <?php
            }elseif(isset($_SESSION['enfermaria'])){
                ?>
                <script>
                    window.alert("Dados Inseridos com Sucesso");
                    window.location.href = "../enfermaria/acoes_realizadas.php?id=<?php echo $id_atendimento; ?>";
                </script>
            <?php
            }elseif(isset($_SESSION['medico'])){
                ?>
                <script>
                    window.alert("Dados Inseridos com Sucesso");
                    window.location.href = "../medico/acoes_realizadas.php?id=<?php echo $id_atendimento; ?>";
                </script>
            <?php
            }// Captura o último ID inserido
    } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }
    } else {
        echo "Erro na preparação da query: " . $conn->error;
    }

}
?>
