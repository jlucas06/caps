<!DOCTYPE html>
<html lang="en">

<?php 
include "head.php";
?>
<style>
        .login-image {
           margin-top: 15%;
        }
        .back-ground {
           margin-top: 7%;
        }
    </style>
    <script>
    $(document).ready(function() {
        $('#cpf').on('input', function() {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length > 11) {
                value = value.slice(0, 11);
            }
            
            if (value.length <= 3) {
                $(this).val(value);
            } else if (value.length <= 6) {
                $(this).val(`${value.slice(0, 3)}.${value.slice(3)}`);
            } else if (value.length <= 9) {
                $(this).val(`${value.slice(0, 3)}.${value.slice(3, 6)}.${value.slice(6)}`);
            } else {
                $(this).val(`${value.slice(0, 3)}.${value.slice(3, 6)}.${value.slice(6, 9)}-${value.slice(9, 11)}`);
            }
        });
    });
    </script>
<body class="bg-gradient-primary">

    <div class="container back-ground">
        
        <!-- Outer Row -->
        <div class="row justify-content-center">
            
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0"></div>
                        <div class="container">
                            <div class=""> 
                                <div class="p-5">
                                    
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Cadastro de Usuario CAPS!</h1>
                                    </div>
                                    <form class="user" method = "POST" action = "insere_cadastro.php">
                                        <div class="form-group">
                                            <label class ="text-dark" style =  "margin-left:10px"> NOME COMPLETO :</label>
                                            <input for="nome" type="text" class="form-control form-control-user" name = "nome" placeholder="Digite seu nome"  required>
                                        </div>
                                        <div class="form-group">
                                            <label class ="text-dark"  style =  "margin-left:10px"> CPF :</label>
                                            <input for="cpf" type="text" class="form-control form-control-user" name = "cpf" placeholder="XXX.XXX.XXX-XX"  required>
                                        </div>
                                        <div class="form-group">
                                            <label class ="text-dark" style =  "margin-left:10px"> SENHA :</label>
                                            <input for="senha" type="password" class="form-control form-control-user" name = "senha" placeholder="Digite sua senha"  required>
                                        </div>
                                        <div class="form-group">
                                            <label class ="text-dark" style =  "margin-left:10px"> TIPO DE USUARIO :</label>
                                            <select name = "tipo_usuario"  class = "text-dark form-control ">
                                                <option disabled selected>SELECIONE O TIPO DO USUARIO</option>
                                                <option value = "2"> RECEPCIONISTA </option>
                                                <option value = "3"> ENFERMEIRA </option>
                                                <option value = "4"> MÉDICO </option>
                                            </select>
                                        </div>
                                        
                                        <hr>
                                        <div class="text-center">
                                        <input type = "submit" class="btn btn-primary" value = "CADASTRAR">
                                        <a href = "index.php" class="btn btn-danger text-white"> VOLTAR </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
