<?php
require 'conexao.php';

// 1. Busca os dados do livro para exibir no formulário
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM estante WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $livro = $stmt->fetch();
}

// 2. Processa o UPDATE quando o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE estante SET nome_livro = ?, paginas_totais = ?, autor = ? WHERE id = ?");
    $stmt->execute([$_POST['nome'], $_POST['paginas'], $_POST['autor'], $_POST['id']]);
    
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
</head>
<body>
    <h2>Editar Livro</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $livro['id'] ?>">
        
        <input type="text" name="nome" value="<?= $livro['nome_livro'] ?>" required>
        <input type="number" name="paginas" value="<?= $livro['paginas_totais'] ?>" required>
        <input type="text" name="autor" value="<?= $livro['autor'] ?>" required>
        
        <button type="submit">Atualizar Livro</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>