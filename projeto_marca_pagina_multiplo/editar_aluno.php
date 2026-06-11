<?php
require 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE alunos SET nome = ? WHERE id = ?");
    $stmt->execute([$_POST['nome'], $_POST['id']]);
    header("Location: alunos.php");
}
$aluno = $pdo->prepare("SELECT * FROM alunos WHERE id = ?");
$aluno->execute([$_GET['id']]);
$a = $aluno->fetch();
?>
<form method="POST">
    <input type="hidden" name="id" value="<?= $a['id'] ?>">
    <input type="text" name="nome" value="<?= $a['nome'] ?>" required>
    <button type="submit">Atualizar</button>
</form>