<?php

Namespace Models;
use Lib\conexion;

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

}