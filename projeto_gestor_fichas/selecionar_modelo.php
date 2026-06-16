<?php
$arquivo = 'modelos.json';
$modelos = file_exists($arquivo) ? json_decode(file_get_contents($arquivo), true) : [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Selecionar Modelo</title>
</head>
<body>

    <h1>Selecionar Modelo de Ficha</h1>
    
    <label for="modelo_select">Escolha o modelo:</label>
    <select id="modelo_select" onchange="mostrarCampos()">
        <option value="">-- Selecione --</option>
        <?php foreach ($modelos as $m): ?>
            <option value="<?= $m['id'] ?>">
                <?= $m['id'] ?>, <?= htmlspecialchars($m['titulo']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <div id="detalhes_modelo" style="margin-top: 20px; border: 1px solid #ccc; padding: 15px; display: none;">
        <h3>Campos do Modelo Selecionado:</h3>
        <div id="lista_campos"></div>
        <br>
        <form action="criar_personagem.php" method="GET">
            <input type="hidden" name="modelo_id" id="modelo_id_input">
            <button type="submit">Continuar</button>
        </form>
    </div>

    <script>
        // Transforma o array PHP em um objeto JavaScript
        const modelos = <?= json_encode($modelos) ?>;

        function mostrarCampos() {
            const select = document.getElementById('modelo_select');
            const divDetalhes = document.getElementById('detalhes_modelo');
            const divLista = document.getElementById('lista_campos');
            const inputHidden = document.getElementById('modelo_id_input');

            const idSelecionado = select.value;

            if (idSelecionado) {
                const modelo = modelos.find(m => m.id == idSelecionado);
                inputHidden.value = idSelecionado;
                divLista.innerHTML = '';

                modelo.campos.forEach(c => {
                    divLista.innerHTML += `
                        <p><strong>Nome:</strong> ${c.nome} | 
                           <strong>Tipo:</strong> ${c.tipo} | 
                           <strong>Obrigatório:</strong> ${c.obrigatorio ? 'Sim' : 'Não'}</p>
                    `;
                });

                divDetalhes.style.display = 'block';
            } else {
                divDetalhes.style.display = 'none';
            }
        }
    </script>
</body>
</html>