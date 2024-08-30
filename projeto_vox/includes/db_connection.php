<?php
$dsn = 'pgsql:host=localhost;port=5432;dbname=banco_de_dados';
$usuario = 'lavinia';
$senha = '11055460';

try {
    $pdo = new PDO($dsn, $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    die('Erro de conexão: ' . $e->getMessage());
}
?>
