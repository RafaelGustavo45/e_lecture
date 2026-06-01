<?php
require 'conexao.php';

// 1. Processar o formulário de adição
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_livro = $_POST['id_livro'];
    $pagina_atual = (int)$_POST['pagina_atual'];

    // Buscar o total de páginas para validar
    $stmt = $pdo->prepare("SELECT paginas_totais FROM estante WHERE id = ?");
    $stmt->execute([$id_livro]);
    $livro = $stmt->fetch();

    if ($livro && $pagina_atual <= $livro['paginas_totais']) {
        $insert = $pdo->prepare("INSERT INTO andamento (id_livro_fk, pagina_atual) VALUES (?, ?)");
        $insert->execute([$id_livro, $pagina_atual]);
        header("Location: andamento.php");
        exit();
    } else {
        $erro = "Erro: A página atual não pode ser maior que o total de páginas (" . $livro['paginas_totais'] . ").";
    }
}

// 2. Buscar livros da estante para o select
$livros = $pdo->query("SELECT id, nome_livro, paginas_totais FROM estante")->fetchAll();
?>

<h2>Iniciar Leitura</h2>
<?php if (isset($erro)) echo "<p style='color:red'>$erro</p>"; ?>

<form method="POST">
    <label>Selecione o Livro:</label>
    <select name="id_livro" required>
        <?php foreach ($livros as $l): ?>
            <option value="<?= $l['id'] ?>">
                <?= $l['nome_livro'] ?> (Total: <?= $l['paginas_totais'] ?> págs)
            </option>
        <?php endforeach; ?>
    </select>

    <label>Página Atual:</label>
    <input type="number" name="pagina_atual" min="0" required>
    
    <button type="submit">Adicionar à Leitura</button>
</form>
<a href="andamento.php">Voltar</a>