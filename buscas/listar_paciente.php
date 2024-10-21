<?php
include ("../conexao.php");



$id_usuario = intval($_GET['id_usuario']);

// Prepara e executa a consulta para buscar os detalhes do ID
$sql = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
$result = $conn->prepare($sql);
$result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

if ($result->execute()) {
    $dados = $result->fetch();
} else {
    echo "Erro ao buscar dados.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>número do Paciente</th>
                                    <th>Nome do Paciente</th>
                                    <th>CPF/CNS</th>
                                    <th>Sexo</th>
                                    <th>Nascimento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($dados): ?>
                                    <td><?= htmlspecialchars($dados['nprontuario']) ?></td>
                                    <td><?= htmlspecialchars($dados['nome_paciente']) ?></td>
                                    <td><?= htmlspecialchars($dados['cpf_cns']) ?></td>
                                    <td><?= htmlspecialchars($dados['sexo']) ?></td>
                                    <td><?= htmlspecialchars($dados['nascimento']) ?></td>    
                                    <?php else: ?>
                                    <p>Nenhum dado encontrado para o ID especificado.</p>
                                    <?php endif; ?>                               
                            </tbody>
                        </table>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nacionalidade</th>
                                    <th>Descrição</th>
                                    <th>Raça</th>
                                    <th>Etnia</th>
                                    <th>Nome da mãe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($dados): ?>
                                    <td><?= htmlspecialchars($dados['nacionalidade']) ?></td>
                                    <td><?= htmlspecialchars($dados['descricao']) ?></td>
                                    <td><?= htmlspecialchars($dados['raca']) ?></td>
                                    <td><?= htmlspecialchars($dados['etinia']) ?></td>
                                    <td><?= htmlspecialchars($dados['nome_mae']) ?></td>    
                                    <?php else: ?>
                                    <p>Nenhum dado encontrado para o ID especificado.</p>
                                    <?php endif; ?>                               
                            </tbody>
                        </table>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nome do Resposável</th>
                                    <th>Município de Residência</th>
                                    <th>CEP</th>
                                    <th>Endereço</th>
                                    <th>Complemento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($dados): ?>
                                    <td><?= htmlspecialchars($dados['nome_responsavel']) ?></td>
                                    <td><?= htmlspecialchars($dados['municipio_residencia']) ?></td>
                                    <td><?= htmlspecialchars($dados['cep']) ?></td>
                                    <td><?= htmlspecialchars($dados['endereco']) ?></td>
                                    <td><?= htmlspecialchars($dados['complemento']) ?></td>    
                                    <?php else: ?>
                                    <p>Nenhum dado encontrado para o ID especificado.</p>
                                    <?php endif; ?>                               
                            </tbody>
                        </table>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Telefone Celular</th>
                                    <th>Telefone de Contato</th>
                                    <th>Situação de Rua</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($dados): ?>
                                    <td><?= htmlspecialchars($dados['telefone_celular']) ?></td>
                                    <td><?= htmlspecialchars($dados['telefone_contato']) ?></td>
                                    <td><?= htmlspecialchars($dados['situacao_rua']) ?></td> 
                                    <?php else: ?>
                                    <p>Nenhum dado encontrado para o ID especificado.</p>
                                    <?php endif; ?>                               
                            </tbody>
                        </table>
                        <a href = "busca_paciente.php" class="btn btn-primary"> Voltar</a>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>