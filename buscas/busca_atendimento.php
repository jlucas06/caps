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
                                    <th>Nome do Paciente</th>
                                    <th>CPF/CNS</th>
                                    <th>Sexo</th>
                                    <th>Nome da Mãe</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../conexao.php";
                                session_start();
                                $cpf = $_SESSION['medico'];
                                $sql ="SELECT * FROM tb_atendimento WHERE cpf_medico = $cpf";
                                $result = $conn->prepare($sql);
                                if($result->execute()){
                                    $dados = $result->fetchAll();
                                    foreach ($dados as $k) {
                                        ?>
                                        <tr>
                                            <td><?= $k['nome_paciente'] ?></td>
                                            <td><?= $k['cpf_cns'] ?></td>
                                            <td><?= $k['sexo'] ?></td>
                                            <td><?= $k['nome_mae'] ?></td>
                                            <td> <a href = "listar_paciente.php?id_usuario=<?= $k['id_usuario'] ?>"> VER MAIS</a>  </td>
                                        </tr>

                                        <?php
                                    }
                                }
                                ?>
                                
                            </tbody>
                        </table>
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