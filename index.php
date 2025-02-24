<?php
ob_start();
// Inicio la sesión
session_start();

require_once "config/param.php";
require_once "autoload.php";

use Controllers\ErrorController;

// Incluyo la cabecera de la página
require_once __DIR__ . '/views/layout/header.php';



function show_error(){
    (new ErrorController())->index();
}

// Si existe el controlador por la URL, golfo
// Si no existe, se carga el controlador por defecto
// Si no existe el controlador por defecto, se muestra un error (never)

if(isset($_GET['controller'])){

    $nombre_controlador = 'controllers\\' . $_GET['controller'] . 'Controller';

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    
    $nombre_controlador = 'controllers\\' . controlador_base . 'Controller';
    
}else{

    echo "Controlador no encontrado";
    show_error();
    exit();

}

// Compruebo si existe la clase

if(class_exists($nombre_controlador)){

    $controlador = new $nombre_controlador();

    // Si existe la acción por la URL, golfo
    // Si no existe, se carga la acción por defecto
    // Si no existe la acción por defecto, se muestra un error (never)

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){

        $action = $_GET['action'];
        $controlador->$action();

    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    
        $action_default = accion_predeterminada;
        $controlador->$action_default();
        
    }else{

        echo "Acción por defecto no encontrada";
        show_error();

    }

}else{

    echo "Controlador no encontrado";
    show_error();

}

require_once __DIR__ .'/views/layout/footer.php';

ob_end_flush();
?>