<?php
$arquivo_fichas = 'fichas.json';
$arquivo_modelos = 'modelos.json';

// 1. Carrega e garante que $fichas seja um array
if (!file_exists($arquivo_fichas)) {
    $fichas = [];
} else {
    $conteudo = file_get_contents($arquivo_fichas);
    $fichas = json_decode($conteudo, true);
    // Se o arquivo estiver vazio ou corrompido, garante array vazio
    if (!is_array($fichas)) {
        $fichas = [];
    }
}

// 2. Carrega modelos
$modelos = json_decode(file_get_contents($arquivo_modelos), true);
$modelo = array_filter($modelos, fn($m) => $m['id'] == $_POST['id_fk_modelo']);
$modelo = reset($modelo);

$dados = [];
foreach ($modelo['campos'] as $campo) {
    $nome_campo = $campo['nome'];
    $val = $_POST[$nome_campo] ?? null;

    // Validação de obrigatoriedade
    if ($campo['obrigatorio'] && ($val === true || $val === null)) {
        die("Erro: O campo {$nome_campo} é obrigatório.");
    }

    // Discernimento de tipos
    if ($val !== '' && $val !== null) {
        if ($campo['tipo'] == 'int') $val = (int)$val;
        elseif ($campo['tipo'] == 'float') $val = (float)$val;
        elseif ($campo['tipo'] == 'boolean') $val = (bool)(int)$val; // Converte "1"/"0" para true/false
        elseif ($campo['tipo'] == 'date') {
            // Opcional: formata para DD/MM/AAAA conforme seu requisito
            $val = date("d/m/Y", strtotime($val));
        }
    }
    $dados[$nome_campo] = $val;
}

// 3. Adiciona a nova ficha ao array
$fichas[] = [
    'id_fk_modelo' => (int)$modelo['id'],
    'id' => count($fichas) + 1,
    'dados' => $dados
];

// 4. Salva no arquivo
file_put_contents($arquivo_fichas, json_encode($fichas, JSON_PRETTY_PRINT));
echo "Ficha salva com sucesso! <a href='index.html'>Voltar</a>";
?>