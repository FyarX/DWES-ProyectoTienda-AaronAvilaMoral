<?php
// Configuración de la conexión con PDO
    $dsn = "mysql:host=localhost;dbname=proyecto_final_tienda;charset=utf8mb4";
    $username = "root";
    $password = "";
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
return $pdo;