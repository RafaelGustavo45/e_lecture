<?php
require 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO progressao (id_fk_aluno, id_fk_livro, pagina_atual) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['id_aluno'], $_POST['id_livro'], $_POST['pagina']]);
    header("Location: progressao.php");
}
$alunos = $pdo->query("SELECT * FROM alunos")->fetchAll();
$livros = $pdo->query("SELECT * FROM estante")->fetchAll();
?>
<form method="POST">
    <select name="id_aluno">
        <?php foreach($alunos as $a): ?><option value="<?= $a['id'] ?>"><?= $a['nome'] ?></option><?php endforeach; ?>
    </select>
    <select name="id_livro">
        <?php foreach($livros as $l): ?><option value="<?= $l['id'] ?>"><?= $l['titulo'] ?></option><?php endforeach; ?>
    </select>
    <input type="number" name="pagina" placeholder="Página Atual" required>
    <button type="submit">Registrar</button>
</form>