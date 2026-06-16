<?php
function salvarModelo($novo_modelo) {
    $arquivo = 'modelos.json';
    
    // 1. Garante que o arquivo existe, caso contrário cria um array vazio
    if (!file_exists($arquivo)) {
        $dados = [];
    } else {
        $conteudo = file_get_contents($arquivo);
        // 2. Decodifica e garante que é um array, se falhar, inicializa vazio
        $dados = json_decode($conteudo, true);
        if (!is_array($dados)) {
            $dados = [];
        }
    }
    
    // 3. Define o ID baseado na contagem do array atual
    $novo_modelo['id'] = count($dados) + 1;
    $dados[] = $novo_modelo;
    
    // 4. Salva no arquivo
    file_put_contents($arquivo, json_encode($dados, JSON_PRETTY_PRINT));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $campos = [];

    for ($i = 0; $i < 12; $i++) {
        // Verifica se o campo foi enviado no formulário
        if (!empty($_POST["campo_nome_$i"])) {
            $campos[] = [
                "nome" => $_POST["campo_nome_$i"],
                "tipo" => $_POST["campo_tipo_$i"],
                "obrigatorio" => isset($_POST["campo_obrigatorio_$i"]) // Checkbox marcado vira true
            ];
        }
    }

    if (count($campos) > 0) {
        salvarModelo(['titulo' => $titulo, 'campos' => $campos]);
        echo "Modelo '$titulo' criado com sucesso! <a href='index.html'>Voltar</a>";
    } else {
        echo "Erro: Nenhum campo foi adicionado.";
    }
}
?>