<?php
$id = $_GET['id'];
$fichas = json_decode(file_get_contents('fichas.json'), true);

// Filtra para remover a ficha com o ID informado
$fichas = array_values(array_filter($fichas, fn($f) => $f['id'] != $id));

file_put_contents('fichas.json', json_encode($fichas, JSON_PRETTY_PRINT));
header("Location: listar_personagens.php");