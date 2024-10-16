
<?php 
include "conexao.php";
if(isset($_POST['cpf'])){
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $cns = NULL;
    $cbo = NULL;
    
    if($tipo_usuario == 4){

        $sql = "SELECT * FROM tb_profissionais";
        $resultado = $conn->query($sql);
        if($resultado->execute()){
            $dados = $resultado->fetchAll();
            foreach ($dados as $k) {
                if($k['CPF'] == $cpf){
                    $cns = $k['CNS'];
                    $cbo = $k['CBO'];
                }
            }
            
            if($cns != NULL && $cbo != NULL){
                $sql = "INSERT INTO tb_login (nome, cpf, senha, cns, cbo, tipo_usuario) VALUES ('$nome','$cpf','$senha','$cns','$cbo','$tipo_usuario')";
                $r = $conn->query($sql);
                if($r->execute()){
                    ?>
                    <script>
                        window.alert("Cadastro Realizado com sucesso!");
                        window.location.href = "index.php";
                    </script>
                    <?php
                }
            }else{
                ?>
                <script>
                    window.alert("Dados do médico não encontrados!");
                    window.location.href = "form_cadastrar.php";
                </script>
                <?php
            }
        }
    }else{
        $sql = "INSERT INTO tb_login (nome, cpf, senha, tipo_usuario) VALUES ('$nome', '$cpf','$senha','$tipo_usuario')";
        $r = $conn->query($sql);
        if($r->execute()){
            ?>
                    <script>
                        window.alert("Cadastro Realizado com sucesso!");
                        window.location.href = "index.php";
                    </script>
                    <?php
        }else{
            ?>
                <script>
                    window.alert("Erro ao realizar o Cadastro!");
                    window.location.href = "form_login.php";
                </script>
                <?php

        }
        
    }
}

?>