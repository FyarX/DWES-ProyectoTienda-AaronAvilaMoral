<?php

Namespace Models;
use Lib\conexion;

class Pedido {

    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $bbdd;

    public function __construct() {
        $this->bbdd = new Conexion();
    }

    //? ************* GETTERS DE LA CLASE *************
    public function getId() {
        return $this->id;
    }

    public function getUsuarioId() {
        return $this->usuario_id;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getdireccion() {
        return $this->direccion;
    }

    public function coste() {
        return $this->coste;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    //? ************* SETTERS DE LA CLASE *************
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setUsuarioId($usuarioId) {
        $this->usuario_id = $usuarioId;
    }

    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    public function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    public function setdireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }
}