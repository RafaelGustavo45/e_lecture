<?php require 'conexao.php'; $livros = $pdo->query("SELECT * FROM estante")->fetchAll(); ?>
<!DOCTYPE html>
<html>
<body>
    <h2>Estante de Livros</h2>
    <a href="adicionar_estante.php">+ Adicionar Livro</a>
    <table border="1">
        <tr><th>ID</th><th>Título</th><th>Páginas</th><th>Ações</th></tr>
        <?php foreach ($livros as $l): ?>
        <tr>
            <td><?= $l['id'] ?></td>
            <td><?= $l['titulo'] ?></td>
            <td><?= $l['numero_paginas'] ?></td>
            <td>
                <a href="editar_estante.php?id=<?= $l['id'] ?>">Editar</a> |
                <a href="excluir_estante.php?id=<?= $l['id'] ?>" onclick="return confirm('Excluir?')">Deletar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>