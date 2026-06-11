<?php
require 'conexao.php';

// Verifica se o ID foi enviado pela URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara e executa a exclusão
    $stmt = $pdo->prepare("DELETE FROM estante WHERE id = ?");
    $stmt->execute([$id]);
}

// Redireciona de volta para a página principal após a exclusão
header("Location: index.php");
exit();
?>