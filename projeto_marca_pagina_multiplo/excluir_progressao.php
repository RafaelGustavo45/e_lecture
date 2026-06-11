<?php
require 'conexao.php';
if (isset($_GET['id'])) {
    $pdo->prepare("DELETE FROM progressao WHERE id = ?")->execute([$_GET['id']]);
}
header("Location: progressao.php");