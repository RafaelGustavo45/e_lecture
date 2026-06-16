<?php
$arquivo = 'modelos.json';
$modelos = [];

// Carrega os dados do arquivo se ele existir
if (file_exists($arquivo)) {
    $conteudo = file_get_contents($arquivo);
    $modelos = json_decode($conteudo, true);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Modelos de Ficha</title>
</head>
<body>

    <h1>Modelos Cadastrados</h1>

    <?php if (empty($modelos)): ?>
        <p>Sem modelos</p>
    <?php else: ?>
        <?php foreach ($modelos as $modelo): ?>
            <div style="border: 1px solid #ccc; margin: 15px; padding: 15px;">
                <h2><?= htmlspecialchars($modelo['titulo']) ?></h2>
                <p><strong>ID da ficha:</strong> <?= $modelo['id'] ?></p>

                <h3>Campos:</h3>
                <?php foreach ($modelo['campos'] as $campo): ?>
                    <div style="background: #f4f4f4; margin: 5px; padding: 5px;">
                        <p><strong>Nome:</strong> <?= htmlspecialchars($campo['nome']) ?></p>
                        <p><strong>Tipo:</strong> <?= htmlspecialchars($campo['tipo']) ?></p>
                        <p><strong>Obrigatório:</strong> <?= $campo['obrigatorio'] ? 'Sim' : 'Não' ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>