<?php

// Detecta se está rodando no Railway
$railway = !empty(getenv("RAILWAY_ENVIRONMENT"));

if ($railway) {

    // Configurações do banco no Railway
    $host = getenv("MYSQLHOST");
    $porta = getenv("MYSQLPORT");
    $banco = getenv("MYSQLDATABASE");
    $usuario = getenv("MYSQLUSER");
    $senha = getenv("MYSQLPASSWORD");

} else {

    // Configurações locais do XAMPP
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

    error_log("Erro na conexão com o banco: " . $e->getMessage());

    die("Não foi possível conectar ao banco de dados.");

}
