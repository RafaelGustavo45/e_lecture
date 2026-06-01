<?php 
require 'conexao.php';

// Lógica de Deletar
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM estante WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
    header("Location: index.php");
}

// Lógica de Adicionar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adicionar'])) {
    $stmt = $pdo->prepare("INSERT INTO estante (nome_livro, paginas_totais, autor) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['nome'], $_POST['paginas'], $_POST['autor']]);
}

// Buscar livros
$livros = $pdo->query("SELECT * FROM estante")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minha Estante Virtual</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    </style>
</head>
<body>

    <h2>Adicionar Livro</h2>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome do Livro" required>
        <input type="number" name="paginas" placeholder="Páginas" required>
        <input type="text" name="autor" placeholder="Autor" required>
        <button type="submit" name="adicionar">Salvar</button>
    </form>

    <table>
        <tr>
            <th>ID</th><th>Livro</th><th>Páginas</th><th>Autor</th><th>Ações</th>
        </tr>
        <?php foreach ($livros as $livro): ?>
        <tr>
            <td><?= $livro['id'] ?></td>
            <td><?= $livro['nome_livro'] ?></td>
            <td><?= $livro['paginas_totais'] ?></td>
            <td><?= $livro['autor'] ?></td>
            <td>
                <a href="excluir.php?id=<?= $livro['id'] ?>" 
   onclick="return confirm('Tem certeza que deseja excluir este livro da estante?')">
   Deletar
</a>
                <a href="editar.php?id=<?= $livro['id'] ?>">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>