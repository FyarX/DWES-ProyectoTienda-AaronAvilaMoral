<?php
namespace Controllers;

// Llamada al modelo Categoría para interactuar con la base de datos
use Models\Categoria;

class CategoriaController{

    public function default(){
        $categoria = new Categoria();
        $categorias = $categoria->getCategorias();

        // Llamada a la vista que muestra las categorías
        require_once 'views/categoria/indexCategoria.php';
    }

    public function crearCategoria(){
        // Llamada a la vista que muestra el formulario para crear una categoría
        require_once 'views/categoria/crearCategoria.php';
    }

    public function guardarCategoria(){
        
    }
}
