<?php
$arquivo_fichas = 'fichas.json';
$fichas = file_exists($arquivo_fichas) ? json_decode(file_get_contents($arquivo_fichas), true) : [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Personagens</title>
</head>
<body>

    <h1>Personagens Cadastrados</h1>

    <?php if (empty($fichas)): ?>
        <p>Nenhuma ficha cadastrada.</p>
    <?php else: ?>
        <?php foreach ($fichas as $ficha): ?>
            <div style="border: 2px solid #333; margin: 20px; padding: 15px; border-radius: 8px;">
                <h2>Ficha ID: <?= $ficha['id'] ?></h2>
                <p><strong>Modelo Vinculado (ID):</strong> <?= $ficha['id_fk_modelo'] ?></p>
                
                <h3>Dados do Personagem:</h3>
                <ul>
                    <?php foreach ($ficha['dados'] as $nome_campo => $valor): ?>
                        <li>
                            <strong><?= htmlspecialchars($nome_campo) ?>:</strong> 
                            <?php 
                                // Verifica se o valor é booleano para exibir como texto
                                if (is_bool($valor)) {
                                    echo $valor ? 'Sim' : 'Não';
                                } elseif ($valor === '' || $valor === null) {
                                    echo '<em>(vazio)</em>';
                                } else {
                                    echo htmlspecialchars((string)$valor);
                                }
                            ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>