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
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($dados): ?>
                                    <td><?= htmlspecialchars($dados['']) ?></td>
                                    <td><?= htmlspecialchars($dados['']) ?></td>
                                    <td><?= htmlspecialchars($dados['']) ?></td>
                                    <td><?= htmlspecialchars($dados['']) ?></td>
                                    <td><?= htmlspecialchars($dados['']) ?></td>    
                                    <?php else: ?>
                                    <p>Nenhum dado encontrado para o ID especificado.</p>
                                    <?php endif; ?>                               
                            </tbody>
                        </table>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($dados): ?>
                                    <td><?= htmlspecialchars($dados['']) ?></td>
                                    <td><?= htmlspecialchars($dados['']) ?></td>
                                    <td><?= htmlspecialchars($dados['']) ?></td>
                                    <td><?= htmlspecialchars($dados['']) ?></td>
                                    <td><?= htmlspecialchars($dados['']) ?></td>    
                                    <?php else: ?>
                                    <p>Nenhum dado encontrado para o ID especificado.</p>
                                    <?php endif; ?>                               
                            </tbody>
                        </table>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($dados): ?>
                                    <td><?= htmlspecialchars($dados['']) ?></td>
                                    <td><?= htmlspecialchars($dados['']) ?></td>
                                    <td><?= htmlspecialchars($dados['']) ?></td>
                                    <td><?= htmlspecialchars($dados['']) ?></td>
                                    <td><?= htmlspecialchars($dados['']) ?></td>    
                                    <?php else: ?>
                                    <p>Nenhum dado encontrado para o ID especificado.</p>
                                    <?php endif; ?>                               
                            </tbody>
                        </table>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($dados): ?>
                                    <td><?= htmlspecialchars($dados['']) ?></td>
                                    <td><?= htmlspecialchars($dados['']) ?></td>
                                    <td><?= htmlspecialchars($dados['']) ?></td> 
                                    <?php else: ?>
                                    <p>Nenhum dado encontrado para o ID especificado.</p>
                                    <?php endif; ?>                               
                            </tbody>
                        </table>
                        <a href = "busca_atendimento.php" class="btn btn-primary"> Voltar</a>
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