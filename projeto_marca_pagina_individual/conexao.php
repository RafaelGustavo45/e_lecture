<?php
$host = 'localhost';
$db = 'marca_pagina_individual';
$user = 'root';
$pass = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>