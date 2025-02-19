<?php
namespace Controllers;

use Models\Usuario;
use Lib\Conexion;

require_once"../Models/Usuario.php";

class UsuarioController{
    private $pdo;

    public function __construct(){
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
    }

    public function cargarFormRegistro(){
        require_once __DIR__ ."../views/usuario/formregistro.php";
    }

    public function registrarUsuario(){
        if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['botonRegistro'])){

            // Comprobación de validez del email
            $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            $password = trim($_POST['password']);

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
                        $stmt->bindParam(':password', $password_hash);
                        $stmt->execute();
                        header("Location: ../index.php");
                        $_SESSION["registro"] = "bien";
                        exit();
                    } else {
                        $_SESSION["registro"] = "mal";
                    }
                } else {
                    $_SESSION["registro"] = "mal";
                }
        }

        header("Location: <?php URL_BASE ?>usuario/cargarFormRegistro");
    }

    public function login(){
        if(isset($_POST)){
            $usuario = new Usuario(null, null, $_POST['email'], $_POST['password'], null, null  );
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
        }
    }
}