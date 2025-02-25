<?php
namespace Controllers;

// Llamada al modelo Categoría para interactuar con la base de datos
use Models\Categoria;
use Helpers\Utils;

class CategoriaController{

    public function default(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getCategorias();

        // Llamada a la vista que muestra las categorías
        require_once 'views/categoria/index.php';
    }

    public function crearCategoria(){
        Utils::isAdmin();
        // Llamada a la vista que muestra el formulario para crear una categoría
        require_once 'views/categoria/crearCategoria.php';
    }

    public function guardarCategoria(){
        Utils::isAdmin();

        if(isset($_POST) && isset($_POST['nombre'])){
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->guardarCategoria();
        }
    }
}
