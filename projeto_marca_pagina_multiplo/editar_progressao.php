<?php
require 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE progressao SET pagina_atual = ? WHERE id = ?");
    $stmt->execute([$_POST['pagina'], $_POST['id']]);
    header("Location: progressao.php");
}
$p = $pdo->prepare("SELECT * FROM progressao WHERE id = ?");
$p->execute([$_GET['id']]);
$prog = $p->fetch();
?>
<form method="POST">
    <input type="hidden" name="id" value="<?= $prog['id'] ?>">
    <input type="number" name="pagina" value="<?= $prog['pagina_atual'] ?>" required>
    <button type="submit">Atualizar</button>
</form>