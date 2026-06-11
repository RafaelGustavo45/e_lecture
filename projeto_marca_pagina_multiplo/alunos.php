<?php require 'conexao.php'; $alunos = $pdo->query("SELECT * FROM alunos")->fetchAll(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gestão de Alunos</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
    </style>
</head>
<body>
    <h2>Lista de Alunos</h2>
    <a href="adicionar_aluno.php">+ Adicionar Aluno</a>
    <table>
        <tr><th>ID</th><th>Nome</th><th>Ações</th></tr>
        <?php foreach ($alunos as $a): ?>
        <tr>
            <td><?= $a['id'] ?></td>
            <td><?= $a['nome'] ?></td>
            <td>
                <a href="editar_aluno.php?id=<?= $a['id'] ?>">Editar</a> |
                <a href="excluir_aluno.php?id=<?= $a['id'] ?>" onclick="return confirm('Excluir?')">Deletar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>