<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE andamento SET pagina_atual = ? WHERE id = ?");
    $stmt->execute([$_POST['pagina_atual'], $_POST['id']]);
    header("Location: andamento.php");
    exit();
}

$l = $pdo->prepare("SELECT a.*, e.nome_livro FROM andamento a JOIN estante e ON a.id_livro_fk = e.id WHERE a.id = ?");
$l->execute([$_GET['id']]);
$leitura = $l->fetch();
?>

<h2>Atualizar Leitura: <?= $leitura['nome_livro'] ?></h2>
<form method="POST">
    <input type="hidden" name="id" value="<?= $leitura['id'] ?>">
    <label>Página Atual:</label>
    <input type="number" name="pagina_atual" value="<?= $leitura['pagina_atual'] ?>" required>
    <button type="submit">Salvar Progresso</button>
</form>