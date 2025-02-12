<?php

Namespace Models;
use Lib\conexion;

class Categoria {

    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $bbdd;

    public function __construct() {
        $this->bbdd = new Conexion();
    }

    //? ************* GETTERS DE LA CLASE *************
    public function getId() {
        return $this->id;
    }
    
    public function getCategiaId() {
        return $this->categoria_id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getOferta() {
        return $this->oferta;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getImagen() {
        return $this->imagen;
    }

    //? ************* SETTERS DE LA CLASE *************
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setCategoriaId($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function setOferta($oferta) {
        $this->oferta = $oferta;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }
}