<!DOCTYPE html>
<html lang="en">


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php 
                include "navbar.php";
                include "../conexao.php";
                $cpf_cns = $_POST["cpf"];
                $sql = "SELECT * FROM usuario where cpf_cns = '$cpf_cns'";
                $resultado = $conn->prepare($sql);
                $nome = NULL;
                $data_nascimento = NULL;
                
                if($resultado->execute()){
                    $dados=$resultado->fetchAll();
                    foreach ($dados as $k) {
                        $nome = $k['nome_paciente'];
                        $data_nascimento = $k['nascimento'];
                    }
                        
                }
                $date = DateTime::createFromFormat('Y-m-d', $data_nascimento);
                $data_formatada = $date->format('d/m/Y');
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="form-group mb-2">
                    <form action="insere_atendimento.php" method="POST"> 
                        <h3 class = "" style = "font-size:40px"> Cadastrar Novo tendimento </h3>      
                        <div class="row">
                            <div class="col-4">
                            <label style = "font-size:20px"> Digite o CPF ou CNS do paciente : </label>
                                <input type="text" class="form-control" name="cpf1" value = "<?= $cpf_cns ?>" disabled>
                                <input type = "hidden" name = "cpf" value = "<?= $cpf_cns ?>">
                            </div>
                       
                        </div>
                        <div class="row" style = "margin-top:30px">
                            <div class="col">
                            <input type = "text" class = "form-control" name = "nome1" value = "<?= $nome ?>" disabled>
                            <input type = "hidden" name = "nome" value = "<?= $nome ?>">
                            </div>
                            <div class="col">
                            <input type = "text" class = "form-control" name = "data" value = "<?= $data_formatada ?>" disabled>
                            
                            </div>
                            <div class="col">
                            <select name="profissional" class = "form-control">
                                <?php
                                
                                $sql2 = "SELECT * FROM tb_login WHERE tipo_usuario = 4";
                                $resultado2=$conn->prepare($sql2);
                                if ($resultado2->execute()) {
                                        $dados2=$resultado2->fetchAll();
                                        foreach ($dados2 as $j) {
                                        ?>
                                        <option value="<?= $j['cpf'] ?>"> <?=$j['nome']?> </option>
                                        <?php
                                    }
                                }

                                ?>
                            </select>

                            </div>

                        </div>
                    <input type = "submit" value = "Iniciar Atendimento" class = "btn btn-primary" style = "margin-top:10px;float:right">    
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
