<?php

Namespace Models;
use Lib\conexion;

use PDOException;

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
        $this->nombre = $nombre;
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

}