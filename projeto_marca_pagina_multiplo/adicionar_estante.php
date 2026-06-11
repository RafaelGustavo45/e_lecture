<?php
require 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO estante (titulo, numero_paginas) VALUES (?, ?)");
    $stmt->execute([$_POST['titulo'], $_POST['paginas']]);
    header("Location: estante.php");
}
?>
<form method="POST">
    <input type="text" name="titulo" placeholder="Título" required>
    <input type="number" name="paginas" placeholder="Total de Páginas" required>
    <button type="submit">Salvar</button>
</form>