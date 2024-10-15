<?php
require_once("conexao.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar os valores do formulário
    $cod_acao = $_POST['cod_acao'];
    $descricao_acao = $_POST['descricao_acao'];
    $local_realizado = $_POST['local_realizado'];
    $cns = $_POST['cns'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $cbo = $_POST['ocupacao'];
    $descricao_cbo = $_POST['n_paciente'];
    $quantidade = $_POST['quantidade'];
    $srv = $_POST['srv'];
    $data_realizacao = $_POST['data_realizacao'];
    $class = $_POST['class'];
    $id_atendimentos = $_POST['id'];

    $sql = "INSERT INTO acoes (
        cod_acao, descricao_acao, local_realizado, cbo,descricao_cbo, cns, nome, cpf, quantidade, srv, data_realizacao, class, id_atendimentos
    ) VALUES (
        '$cod_acao',
        '$descricao_acao',
        '$local_realizado',
        '$cbo',
        '$descricao_cbo',
        '$cns',
        '$nome',
        '$cpf',
        '$quantidade',
        '$srv',
        '$data_realizacao',
        '$class',
        '$id_atendimentos'
    )";

    if ($stmt = $conn->prepare($sql)) {

        if ($stmt->execute()) {
            $sql2 = "UPDATE dados_atendimento SET status = 2 WHERE id_atendimento = $id_atendimentos";
            $resultado2 = $conn->prepare($sql2);
            if($resultado2->execute()){
                if(isset($_SESSION['admin'])){
                    ?>
                    <script>
                        window.alert("Atendimento Realizado com Sucesso");
                        window.location.href = "../admin/index.php";
                    </script>
                <?php
                } elseif(isset($_SESSION['recepcao'])){
                    ?>
                    <script>
                        window.alert("Atendimento Realizado com Sucesso");
                        window.location.href = "../recepcao/index.php";
                    </script>
                <?php
                }elseif(isset($_SESSION['enfermaria'])){
                    ?>
                    <script>
                        window.alert("Atendimento Realizado com Sucesso");
                        window.location.href = "../enfermaria/index.php";
                    </script>
                <?php
                }elseif(isset($_SESSION['medico'])){
                    ?>
                    <script>
                        window.alert("Atendimento Realizado com Sucesso");
                        window.location.href = "../medico/index.php";
                    </script>
                <?php
                }
            }
           
        } else {
            echo "Erro ao inserir dados: " . $stmt->error;
        }
    } else {
        echo "Erro na preparação da query: " . $conn->error;
    }

}
?>
