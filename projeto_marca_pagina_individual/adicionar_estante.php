<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO estante (nome_livro, paginas_totais, autor) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['nome'], $_POST['paginas'], $_POST['autor']]);
    
    header("Location: estante.php"); // Redireciona de volta após salvar
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Livro</title>
</head>
<body>
    <h2>Novo Livro</h2>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome do Livro" required><br>
        <input type="number" name="paginas" placeholder="Páginas" required><br>
        <input type="text" name="autor" placeholder="Autor" required><br>
        <button type="submit">Salvar</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>