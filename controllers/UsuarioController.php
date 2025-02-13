<?php
namespace Controllers;

use Models\Usuario;

require_once"../Lib/conexion.php";
require_once"../Models/Usuario.php";

class UsuarioController{
    private $pdo;

    public function __construct(){
        $conexion = new Conexion;
        $pdo = $conexion->getPdo();
    }

    public function cargarFormRegistro(){
        require_once __DIR__ ."../views/usuario/formregistro.php";
    }

    public function guardarUsuario(){
        if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['botonRegistro'])){

            // Comprobación de validez del email
            $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            $password = trim($_POST['password']);
            $password2 = trim($_POST['password2']);

                if ($email && $password) {
                    $stmt = $this->pdo->prepare("SELECT id FROM usuarios WHERE email=:email");
                    $stmt->bindParam(':email', $email);
                    $stmt->execute();
            
                    // Si se cumple el if, significa que no existe ningún usuario con ese email
                    if ($stmt->rowCount() == 0) {
                        $password_hash = password_hash($password, PASSWORD_BCRYPT); // Se encripta la contraseña
                        $nombre = htmlspecialchars(trim($_POST['nombre']));
                        $apellidos = htmlspecialchars(trim($_POST['apellidos']));
                        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nombre, apellidos, email, password) 
                                               VALUES (:nombre, :apellidos, :email, :password_hash)");
                        $stmt->bindParam(':nombre', $nombre);
                        $stmt->bindParam(':apellidos', $apellidos);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':password_hash', $password_hash);
                        $stmt->execute();
                        header("Location: ../index.php");
                        $_SESSION["registro"] = "bien";
                        exit();
                    } else {
                        $_SESSION["registro"] = "mal";
                    }
                } else {
                    echo "Por favor, rellena todos los campos del formulario de registro";
                }
        }
    }

    public function login(){
        if(isset($_POST)){
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
        }
    }
}