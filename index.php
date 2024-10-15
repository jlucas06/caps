<!DOCTYPE html>
<html lang="en">
<?php 
include "conexao.php";
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .login-image {
           margin-top: 15%;
        }
        .back-ground {
           margin-top: 7%;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container back-ground">
        
        <!-- Outer Row -->
        <div class="row justify-content-center">
            
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-6 d-none d-lg-block login-image">
                                <img src="img/logo_sm3.png" class="" alt="...">
                            </div>
                            
                            <div class="col-lg-6">
                                
                                <div class="p-5">
                                    
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login CAPS!</h1>
                                    </div>
                                    <form class="user" method = "POST" action = "" >
                                        <div class="form-group">
                                            <input for="cpf" type="cpf" class="form-control form-control-user" 
                                                id="cpf" name = "cpf" aria-describedby="emailHelp"
                                                placeholder="XXX.XXX.XXX-XX" maxlength="11">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="senha" name = "senha" placeholder="Senha">
                                        </div>
                                        <input type = "submit" class="btn btn-primary btn-user btn-block" value = "Login">
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="form_cadastrar.php">Criar Minha Conta!</a>
                                    </div>
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

<?php 
if(isset($_POST['cpf'])){
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha']; 
    $sql = "SELECT * FROM tb_login";
    $result = $conn->query($sql);
    if($result->execute()){
        $dados = $result->fetchAll();
        session_start();
        foreach ($dados as $k) {
            if($k['cpf'] == $cpf && $k['senha'] == $senha){
                if($k['tipo_usuario'] == '1'){
                    $_SESSION['admin'] = $cpf;
                    header('Location: admin/index.php');
                }else if($k['tipo_usuario'] == '2'){
                    $_SESSION['recepcao'] = $cpf;
                    header('Location: recepcao/index.php');
                }else if($k['tipo_usuario'] == '3'){
                    $_SESSION['enfermeira'] = $cpf;
                    header('Location: enfermeira/index.php');
                }else if($k['tipo_usuario'] == '4'){
                    $_SESSION['medico'] = $cpf;
                    header('Location: medico/index.php');
                }

            }
        }
    }
}

?>