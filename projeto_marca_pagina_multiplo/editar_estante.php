<?php
require 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE estante SET titulo = ?, numero_paginas = ? WHERE id = ?");
    $stmt->execute([$_POST['titulo'], $_POST['paginas'], $_POST['id']]);
    header("Location: estante.php");
}
$stmt = $pdo->prepare("SELECT * FROM estante WHERE id = ?");
$stmt->execute([$_GET['id']]);
$livro = $stmt->fetch();
?>
<form method="POST">
    <input type="hidden" name="id" value="<?= $livro['id'] ?>">
    <input type="text" name="titulo" value="<?= $livro['titulo'] ?>" required>
    <input type="number" name="paginas" value="<?= $livro['numero_paginas'] ?>" required>
    <button type="submit">Atualizar</button>
</form>