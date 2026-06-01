<?php
require 'conexao.php';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM andamento WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}
header("Location: andamento.php");