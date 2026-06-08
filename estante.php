<?php 
require 'conexao.php';

// A lógica de deleção continua funcionando aqui ou você pode movê-la para excluir.php
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

    <?php include 'menu.php'; ?>

    <h2>Minha Estante</h2>
    <a href="adicionar_estante.php">
        <button>+ Adicionar Novo Livro</button>
    </a>
    <p> <a href="andamento.php">Ver Andamento de Leitura</a> </p>

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
                <a href="excluir_estante.php?id=<?= $livro['id'] ?>" 
                   onclick="return confirm('Tem certeza?')">Deletar</a> |
                <a href="editar_estante.php?id=<?= $livro['id'] ?>">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>