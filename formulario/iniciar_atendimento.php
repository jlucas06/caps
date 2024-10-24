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
                <div class="container-fluid">
                    <div class="form-group mb-2">
                    <form action="pesquisar_paciente.php" method="POST"> 
                        <h3 class = "" style = "font-size:40px"> Cadastrar Novo tendimento </h3>      
                        <div class="row">
                            
                            <div class="col-3">
                            <label style = "font-size:20px"> Digite o CPF ou CNS do paciente : </label>
                                <input type="text" class="form-control" name="cpf">
                                <button class="btn btn-primary" style="margin-top:10px; float:right">Buscar</button>
                            </div>

                        </div>

                    
                    </form>
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