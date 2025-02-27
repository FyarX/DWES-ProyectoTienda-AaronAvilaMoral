<?php
namespace Helpers;

use Models\Categoria;

class Utils {
    public static function isAdmin() {
        if(!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
            header("Location: " . URL_BASE . "index");
        } else {
            return true;
        }
    }

    public static function showCategorias() {
                
        $categoria = new Categoria();
        $categorias = $categoria->getCategorias();
        return $categorias;
    }
}
?>