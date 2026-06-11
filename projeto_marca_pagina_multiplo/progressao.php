<?php 
require 'conexao.php';
$query = "SELECT p.*, a.nome, e.titulo 
          FROM progressao p 
          JOIN alunos a ON p.id_fk_aluno = a.id 
          JOIN estante e ON p.id_fk_livro = e.id";
$lista = $pdo->query($query)->fetchAll();
?>
<h2>Progresso de Leitura</h2>
<a href="adicionar_progressao.php">+ Registrar Progresso</a>
<table border="1">
    <tr><th>Aluno</th><th>Livro</th><th>Página Atual</th><th>Ações</th></tr>
    <?php foreach ($lista as $p): ?>
    <tr>
        <td><?= $p['nome'] ?></td>
        <td><?= $p['titulo'] ?></td>
        <td><?= $p['pagina_atual'] ?></td>
        <td>
            <a href="editar_progressao.php?id=<?= $p['id'] ?>">Editar</a> |
            <a href="excluir_progressao.php?id=<?= $p['id'] ?>" onclick="return confirm('Excluir?')">Deletar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>