<?php
namespace Controllers;

use Models\Producto;
use Helpers\Utils;

class ProductoController
{
    public function index()
    {
        require_once 'views/producto/destacados.php';
    }

    public function gestion(){
        // Comprobar si el usuario es administrador
        Utils::isAdmin();

        // Crear objeto del modelo Producto
        $producto = new Producto();
        $productos = $producto->getProductos();

        // Llamada a la vista de gestión de productos
        require_once 'views/producto/gestion.php';
    }

    public function crearProducto(){
        // Comprobar si el usuario es administrador
        Utils::isAdmin();

        // Llamada a la vista de creación de productos
        require_once 'views/producto/crearProducto.php';
    }

    public function guardarProducto(){
        // Comprobar si el usuario es administrador
        Utils::isAdmin();

        // Comprobar si se ha enviado el formulario
        if(isset($_POST)){
            
        }
    }
}   