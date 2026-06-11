<?php
require 'conexao.php';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}
header("Location: alunos.php");