<?php
require 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO alunos (nome) VALUES (?)");
    $stmt->execute([$_POST['nome']]);
    header("Location: alunos.php");
}
?>
<form method="POST">
    <input type="text" name="nome" placeholder="Nome do Aluno" required>
    <button type="submit">Salvar</button>
</form>