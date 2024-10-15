<?php
// Inicia a sessão
session_start();

// Destroi a sessão
session_destroy();

// Redireciona para a página de login (index.php)
header("Location: index.php");
exit();
?>