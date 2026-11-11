<?php

$hostRailway = getenv("MYSQLHOST");

if (!empty($hostRailway)) {
    $host = $hostRailway;
    $porta = getenv("MYSQLPORT");
    $banco = getenv("MYSQLDATABASE");
    $usuario = getenv("MYSQLUSER");
    $senha = getenv("MYSQLPASSWORD");
} else {
    $host = "localhost";
    $porta = "3306";
    $banco = "sinalize_amor";
    $usuario = "root";
    $senha = "";
}

try {
    $pdo = new PDO(
        "mysql:host=$host;port=$porta;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    error_log("Erro na conexão: " . $e->getMessage());
    die("Não foi possível conectar ao banco de dados.");
}
