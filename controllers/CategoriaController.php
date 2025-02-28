<?php
namespace Controllers;

// Llamada al modelo Categoría para interactuar con la base de datos
use Models\Categoria;
use Helpers\Utils;
use Models\Producto;

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
            $categoria->guardar();
            if(!isset($_SESSION['errorCategoria'])){
                header('Location: '. URL_BASE . 'categoria/default');
            } else {
                header('Location: '. URL_BASE . 'categoria/crearCategoria');
            }
        }
        
    }

    public function verCategoria(){

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($_GET['id']);
            $categoria = $categoria->getCategoria();

            $producto = new Producto();
            $producto->setCategoriaId($id);
            $productos = $producto->getProductosCategoria();
        }   

        require_once 'views/categoria/verCategoria.php';
    }
}
