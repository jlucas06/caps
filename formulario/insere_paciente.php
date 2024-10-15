<?php
require_once("conexao.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar os valores do formulário
    $nome_paciente = strtoupper($_POST['nome_paciente']);
    $n_prontuario = $_POST['n_prontuario'];
    $cns_cpf = $_POST['cns_cpf'];
    $sexo = strtoupper($_POST['sexo']);
    $dt_nascimento = $_POST['dt_nascimento'];
    $pais = strtoupper($_POST['pais']);
    $raca_cor = $_POST['options'];
    $etnia_indigena = strtoupper($_POST['etnia_indigena']);
    $nome_mae = strtoupper($_POST['nome_mae']);
    $nome_responsavel = strtoupper($_POST['nome_responsavel']);
    $municipio_residencia = strtoupper($_POST['municipio_residencia']);
    $cep = $_POST['cep'];

    $endereco = strtoupper($_POST['endereco']);
    $complemento = strtoupper($_POST['complemento']);
    $telefone_celular = $_POST['telefone_celular'];
    $telefone_contato = $_POST['telefone_contato'];
    $situacao_rua = strtoupper($_POST['situacao_rua']);

    $sql = "INSERT INTO usuario (
        nprontuario, nome_paciente, cpf_cns, sexo, nascimento, 
        nacionalidade, raca, etinia, nome_mae, nome_responsavel, 
        municipio_residencia, cep, endereco, complemento, 
        telefone_celular, telefone_contato, situacao_rua
    ) VALUES (
        $n_prontuario, 
        '$nome_paciente', 
        $cns_cpf, 
        '$sexo', 
        '$dt_nascimento', 
        '$pais', 
        '$raca_cor', 
        '$etnia_indigena', 
        '$nome_mae', 
        '$nome_responsavel', 
        '$municipio_residencia', 
        '$cep', 
        '$endereco', 
        '$complemento', 
        '$telefone_celular', 
        '$telefone_contato', 
        '$situacao_rua'
    )";

    if ($stmt = $conn->prepare($sql)) {

        if ($stmt->execute()) {
            if(isset($_SESSION['admin'])){
                ?>
                <script>
                    window.alert("Dados Inseridos com Sucesso");
                    window.location.href = "../admin/index.php";
                </script>
            <?php
            } elseif(isset($_SESSION['recepcao'])){
                ?>
                <script>
                    window.alert("Dados Inseridos com Sucesso");
                    window.location.href = "../recepcao/index.php";
                </script>
            <?php
            }elseif(isset($_SESSION['enfermaria'])){
                ?>
                <script>
                    window.alert("Dados Inseridos com Sucesso");
                    window.location.href = "../enfermaria/index.php";
                </script>
            <?php
            }elseif(isset($_SESSION['medico'])){
                ?>
                <script>
                    window.alert("Dados Inseridos com Sucesso");
                    window.location.href = "../medico/index.php";
                </script>
            <?php
            }
            
        } else {
            echo "Erro ao inserir dados: " . $stmt->error;
        }
    } else {
        echo "Erro na preparação da query: " . $conn->error;
    }

}
?>
