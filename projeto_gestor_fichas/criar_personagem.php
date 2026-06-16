<?php
$modelo_id = $_GET['modelo_id'];
$modelos = json_decode(file_get_contents('modelos.json'), true);
$modelo = array_filter($modelos, fn($m) => $m['id'] == $modelo_id);
$modelo = reset($modelo);
?>

<h2>Criar Personagem: <?= $modelo['titulo'] ?></h2>
<form action="salvar_personagem.php" method="POST">
    <input type="hidden" name="id_fk_modelo" value="<?= $modelo['id'] ?>">

    <?php foreach ($modelo['campos'] as $campo): ?>
        <div>
            <label><?= $campo['nome'] ?> <?= $campo['obrigatorio'] ? '*' : '' ?></label>
            <?php
            $type = $campo['tipo'] == 'int' || $campo['tipo'] == 'float' ? 'number' : ($campo['tipo'] == 'str' ? 'text' : $campo['tipo']);
            $attr = $campo['tipo'] == 'float' ? 'step="0.01"' : '';
            $required = $campo['obrigatorio'] ? 'required' : '';
            
            if ($campo['tipo'] == 'boolean'): ?>
                <select name="<?= $campo['nome'] ?>" <?= $required ?>>
                    <option value="1">Verdadeiro</option>
                    <option value="0">Falso</option>
                </select>
            <?php else: ?>
                <input type="<?= $type ?>" name="<?= $campo['nome'] ?>" <?= $attr ?> <?= $required ?>>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <button type="submit">Salvar Ficha</button>
</form>