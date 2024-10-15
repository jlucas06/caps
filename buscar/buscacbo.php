<?php
include 'conexao.php'; // Inclua seu arquivo de conexão com o banco de dados

header('Content-Type: application/json'); // Define o tipo de conteúdo como JSON

$term = isset($_GET['term']) ? $_GET['term'] : '';

if ($term) {
    // Prepare a consulta SQL para buscar as descrições que contêm o termo de pesquisa
    $query = $conn->prepare("SELECT descricao,ocupacao FROM tb_cbo WHERE descricao LIKE :term LIMIT 10");
    $query->execute(['term' => "%$term%"]);

    // Obtenha os resultados e converta para JSON
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);
} else {
    echo json_encode([]);
}
?>
