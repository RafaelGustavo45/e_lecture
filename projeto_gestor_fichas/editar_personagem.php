<?php
$fichas = json_decode(file_get_contents('fichas.json'), true);
$models = json_decode(file_get_contents('modelos.json'), true);
$ficha = current(array_filter($fichas, fn($f) => $f['id'] == $_GET['id']));
$modelo = current(array_filter($models, fn($m) => $m['id'] == $ficha['id_fk_modelo']));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($fichas as &$f) {
        if ($f['id'] == $_POST['id']) {
            foreach ($modelo['campos'] as $campo) {
                $f['dados'][$campo['nome']] = $_POST[$campo['nome']] ?? null;
            }
        }
    }
    file_put_contents('fichas.json', json_encode($fichas, JSON_PRETTY_PRINT));
    header("Location: listar_personagens.php");
}
?>
<form method="POST">
    <input type="hidden" name="id" value="<?= $ficha['id'] ?>">
    <?php foreach ($modelo['campos'] as $campo): 
        $val = $ficha['dados'][$campo['nome']]; ?>
        <label><?= $campo['nome'] ?></label>
        <input type="text" name="<?= $campo['nome'] ?>" value="<?= htmlspecialchars($val) ?>"><br>
    <?php endforeach; ?>
    <button type="submit">Atualizar Ficha</button>
</form>