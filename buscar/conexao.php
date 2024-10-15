<?php
// Configurações de conexão com o banco de dados
$host = "localhost"; // Endereço do servidor MySQL (localhost para o servidor local)
$user = "root";      // Nome de usuário do MySQL
$pass = "";          // Senha do usuário MySQL (vazia se não houver senha definida)
$dbname = "caps"; // Nome do banco de dados ao qual conectar

try {
    // Tenta criar uma nova conexão PDO com o banco de dados
    $conn = new PDO("mysql:host=$host;dbname=".$dbname, $user, $pass);
    // Define o modo de erro do PDO para lançar exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $err) {
    // Captura qualquer exceção gerada durante a tentativa de conexão
    // Exibe uma mensagem de erro se a conexão falhar
    echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado: " . $err->getMessage();
}

?>
