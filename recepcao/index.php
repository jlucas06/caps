<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include "head.php";
if (!isset($_SESSION['recepcao'])) {
    header("Location: ../index.php");
    exit();
}
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include "menu.php";
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include "navbar.php";
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid ">
                    <!-- Content Row -->
                    <div class="row centered-cards ">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Atendimentos do Dia</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include "../conexao.php";
                                                $sql = "SELECT * FROM tb_atendimento WHERE data_atendimento = CURDATE()";
                                                $result = $conn->prepare($sql);
                                                if ($result->execute()) {
                                                    $total = $result->rowCount();
                                                    echo $total;
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hospital fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Atendimentos do Mês</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include "../conexao.php";
                                                $sql = "SELECT * FROM tb_atendimento WHERE MONTH(data_atendimento) = MONTH(CURRENT_DATE) AND YEAR(data_atendimento) = YEAR(CURRENT_DATE)";
                                                $result = $conn->prepare($sql);
                                                if ($result->execute()) {
                                                    $total = $result->rowCount();
                                                    echo $total;
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hospital fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Todos
                                                os Atendimentos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include "../conexao.php";
                                                $sql = "SELECT * FROM tb_atendimento WHERE data_atendimento";
                                                $result = $conn->prepare($sql);
                                                if ($result->execute()) {
                                                    $total = $result->rowCount();
                                                    echo $total;
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hospital fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                
            <!-- End of Main Content -->
            <div class="card-body" >
            <h3 >PACIENTES DO DIA</h3>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Paciente</th>
                                <th>CPF/CNS</th>
                                <th>CPF/Médico</th>
                                <th>Data do Atendimento</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../conexao.php";
                            $sql = "SELECT * FROM tb_atendimento WHERE data_atendimento = CURDATE()";
                            $result = $conn->prepare($sql);
                            if ($result->execute()) {
                                $dados = $result->fetchAll();
                                foreach ($dados as $k) {

                                    ?>
                                    <tr>
                                        <td><?= $k['paciente'] ?></td>
                                        <td><?= $k['cpf_cns'] ?></td>
                                        <td>
                                            <?php
                                            $cpf = $k['cpf_medico'];
                                            $sql2 = "SELECT * FROM tb_login WHERE tipo_usuario = 4 AND cpf = $cpf";
                                            $result2 = $conn->prepare($sql2);
                                            $result2->execute();
                                            $dados2 = $result2->fetchAll();
                                            foreach ($dados2 as $j) {
                                                echo $j['cpf'];

                                            }
                                            ?>
                                        </td>
                                        <td><?= $k['data_atendimento'] ?></td>

                                        <td>
                                            <?php
                                            if ($k['estado_atendimento'] == 3) {
                                                echo "<h5 class='text-danger'>Desmarcado</h5>";
                                            } else {
                                                ?>
                                                    <a href="#" data-id="<?= $k['id_atendimentos'] ?>" class="desmarcar-link" data-toggle="modal" data-target="#exampleModal"> DESMARCAR</a>
                                                <?php
                                            }
                                            ?>
                                        </td>

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
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SESA - Secretaria de Saude 2024</span>
                    </div>
                </div>
            </footer>
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

    <script>
    $(document).ready(function() {
        $('.desmarcar-link').on('click', function() {
            var idAtendimento = $(this).data('id');
            // Aqui você pode usar o idAtendimento como quiser, por exemplo:
            $('#exampleModal .modal-body').text('Você deseja desmarcar');
            // Você pode também armazenar o ID em um campo oculto, se necessário
            $('#exampleModal').data('id', idAtendimento);
        });
    });
</script>

<script>
    $(document).on('click', '#confirmarDesmarcar', function() {
        var idAtendimento = $('#exampleModal').data('id');
        // Redireciona ou faz a requisição para desmarcar
        window.location.href = 'desmarcar.php?id_atendimentos=' + idAtendimento;
    });
</script>

</body>

</html>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Desmarcar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" id="confirmarDesmarcar">Confirmar</button>
      </div>
    </div>
  </div>
</div>