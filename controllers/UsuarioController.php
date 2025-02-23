<?php

namespace Controllers;

use Models\Usuario;
use PDOException;

class UsuarioController{
    private $pdo;

    public function __construct(){

    }

    //? Redirige al formulario de registro
    public function cargarFormRegistro(){
        require_once 'views/usuario/formregistro.php';
    }

    //? Redirige al formulario de login
    public function cargarFormLogin(){
        require_once 'views/usuario/formlogin.php';
    }

    //? Registra un usuario en la base de datos
    public function registrarUsuario(){
        if(($_SERVER['REQUEST_METHOD'] == 'POST')){

            $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : false;
            $apellidos = isset($_POST['apellidos']) ? trim($_POST['apellidos']) : false;
            $email = isset($_POST['email']) ? trim($_POST['email']) : false;
            $password = isset($_POST['password']) ? trim($_POST['password']) : false;
            $rol = "usuario";
            
            if($nombre && $apellidos && $email && $password){
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $usuario->setRol($rol);

                try {
                    if ($usuario->guardarUsuario()) {
                        $_SESSION['registro'] = 'bien';
                    } else {
                        $_SESSION['registro'] = 'mal';
                    }
                } catch (PDOException $e) {
                    $_SESSION['registro'] = 'mal';
                    error_log("Error al guardar el usuario: " . $e->getMessage());
                }
            } else {
                $_SESSION['registro'] = 'mal';
            }
        } else {
            $_SESSION['registro'] = 'mal';
        }

        header("Location:". URL_BASE);
        exit();
    }
    
    //? Comprueba si el usuario existe en la base de datos y le asigna a la sesión
    public function loginUsuario(){
        if(isset($_POST)){
            // Se identifica al usuario con los datos recibidos
            $usuario = new Usuario();
            $usuario->setEmail($_POST["email"]);
            $usuario->setPassword($_POST["password"]);

            // Comprobamos si el usuario existe
            $log = $usuario->login();

            // Si el usuario existe, se guarda en la sesión y se redirige a la página principal
            if($log && is_object($log)){
                $_SESSION['log'] = $log;
                header('Location: ' . URL_BASE );

                if($log->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }
            } else {
                // Si el usuario no existe, se redirige al formulario de login con un mensaje de error
                $_SESSION['error_login'] = 'Identificación fallida';
                header('Location: ' . URL_BASE . 'usuario/cargarFormLogin');
            }
        }
    }

    //? Cierra la sesión del usuario
    public function cerrarSesion(){
        // Se cierra la sesión del usuario
        if(isset($_SESSION['log'])){
            unset($_SESSION['log']);
        }

        // Se cierra la sesión si el usuario es administrador
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }

        // Se redirige a la página principal
        header('Location: ' . URL_BASE);
    }
}