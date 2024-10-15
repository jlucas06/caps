<?php

$host = "localhost";
$user = "root";      
$pass = "";          
$dbname = "caps";

try {
 
    $conn = new PDO("mysql:host=$host;dbname=".$dbname, $user, $pass);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $err) {

    echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado: " . $err->getMessage();
}

?>
