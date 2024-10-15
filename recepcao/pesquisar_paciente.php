<!DOCTYPE html>
<html lang="en">

    <?php 
        include "head.php";
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
                <div class="container-fluid">
                    <form action="" method="get">
                        <span>pesquisar</span> 
                        <input type="text" name="cpf">
                        <button class="btn btn-primary">Enviar</button>
                    </form>
                    <select name="" id="">
                        <?php
                        include "../conexao.php";
                        $sql = "SELECT * FROM tb_login WHERE tipo_usuario = 4";
                        $resultado=$conn->prepare($sql);
                        if ($resultado->execute()) {
                                $dados=$resultado->fetchAll();
                                foreach ($dados as $k) {
                                $cpf = $k['cpf'];
                                ?>
                                <option value="<?= $cpf?>"> <?=$k['nome']?> </option>
                                <?php
                            }
                        }

                        ?>
                    </select>
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

</body>

</html>