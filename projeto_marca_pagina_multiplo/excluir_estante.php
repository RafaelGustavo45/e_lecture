<?php
require 'conexao.php';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM estante WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}
header("Location: estante.php");