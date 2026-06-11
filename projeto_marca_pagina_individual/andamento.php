<?php
require 'conexao.php';
$query = "SELECT a.*, e.nome_livro, e.paginas_totais 
          FROM andamento a 
          JOIN estante e ON a.id_livro_fk = e.id";
$leituras = $pdo->query($query)->fetchAll();
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

    <h1>Andamento de Leitura</h1>
    <a href="adicionar_andamento.php">Adicionar Leitura</a>

<table>
    <tr>
        <th>Livro</th><th>Progresso</th><th>%</th><th>Ações</th>
    </tr>
    <?php foreach ($leituras as $l): 
        $perc = ($l['pagina_atual'] / $l['paginas_totais']) * 100;
    ?>
    <tr>
        <td><?= $l['nome_livro'] ?></td>
        <td><?= $l['pagina_atual'] ?> / <?= $l['paginas_totais'] ?></td>
        <td><?= number_format($perc, 1) ?>%</td>
        <td>
            <a href="editar_andamento.php?id=<?= $l['id'] ?>">Editar</a>
            <a href="excluir_andamento.php?id=<?= $l['id'] ?>" onclick="return confirm('Remover da lista?')">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>