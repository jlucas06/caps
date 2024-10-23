<?php
    include "../conexao.php";
    $id = $_GET['id_atendimentos'];
    $sql = "UPDATE tb_atendimento SET estado_atendimento = 3 WHERE id_atendimentos = $id";
    $resultado = $conn->prepare($sql);
    if($resultado->execute()){
        ?>
        <script>
            window.alert("Desmarcado com Sucesso");
            window.location.href = "index.php";
        </script>
    <?php
     }
?>