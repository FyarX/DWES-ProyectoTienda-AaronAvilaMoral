<?php

 Namespace Lib;
 use PDO;
 use PDOException;

// Conexion a la base de datos utilizando una clase y PDO   
class Conexion {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=proyecto_final_tienda;charset=utf8mb4", "root", ""); 
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR: No se pudo conectar. " . $e->getMessage());
        }
    }

    public function getPdo() {
        return $this->pdo;
    }
}