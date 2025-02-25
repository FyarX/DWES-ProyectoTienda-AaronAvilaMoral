<?php

Namespace Models;
use Lib\conexion;

use PDOException;
use Utils\Utils;

class Categoria {

    private $id;
    private $nombre;
    private $bbdd;

    public function __construct() {
        $this->bbdd = new Conexion();
    }

    //? ************* GETTERS DE LA CLASE *************
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    //? ************* SETTERS DE LA CLASE *************
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setNombre($nombre) {
         // Formatear el nombre para que la primera letra sea mayúscula y el resto minúscula
         $this->nombre = ucwords(strtolower($nombre));
    }

    //? ************* MÉTODOS DE LA CLASE *************
    public function getCategorias(){
        try {
            $stmt = $this->bbdd->getPdo()->prepare("SELECT * FROM categorias");
            $stmt->execute();
            $categorias = $stmt->fetchAll();
            return $categorias;
        } catch (PDOException $e) {
            error_log("Error al obtener las categorías: " . $e->getMessage());
            return false;
        }
    }

    public function guardarCategoria(){
        // Validar el nombre de la categoría
        if (preg_match('/^[a-zA-Z\s]{3,}$/', $this->nombre)) {
            try {
                $stmt = $this->bbdd->getPdo()->prepare("INSERT INTO categorias (nombre) VALUES (:nombre)");
                $stmt->bindParam(':nombre', $this->nombre);
                return $stmt->execute();
            } catch (PDOException $e) {
                error_log("Error al guardar la categoría: " . $e->getMessage());
                return false;
            }
        } else {
            error_log("Error: El nombre de la categoría no es válido.");
            return false;
        }
    }
    

}