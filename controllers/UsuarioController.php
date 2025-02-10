<?php
namespace Controllers;

use Models\Usuario;

require_once"../Lib/conexion.php";

class UsuarioController{
    private $usuario;
    private $pdo;

    public function __construct(){
        $this->usuario = new Usuario();
        $this->pdo = require_once __DIR__ . '/../Lib/conexion.php';
    }

    public function cargarFormRegistro(){
        require_once __DIR__ ."../views/usuario/formregistro.php";
    }

    public function guardarUsuario(){
        if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['botonRegistro'])){
            $nombre = htmlspecialchars(trim($_POST['nombre']));
            $apellidos = htmlspecialchars(trim($_POST['apellidos']));
            // Comprobación de validez del email
            $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            // Comprobación de que las contraseñas coinciden
            if($password == $password2){
                if ($email && $password) {
                    $stmt = $this->pdo->prepare("SELECT id FROM usuarios WHERE email=:email");
                    $stmt->bindParam(':email', $email);
                    $stmt->execute();
            
                    // Si no existe el email en la base de datos lo añado
                    if ($stmt->rowCount() == 0) {
                        $password_hash = password_hash($password, PASSWORD_BCRYPT); // Codifico la contraseña en la base de datos
                        $nombre = $_POST['nombreRegistro'];
                        $apellidos = $_POST['apellidosRegistro'];
                        $fecha = date("Y-m-d");
                        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nombre, apellidos, email, password, fecha) 
                                               VALUES (:nombre, :apellidos, :email, :password_hash, :fecha)");
                        $stmt->bindParam(':nombre', $nombre);
                        $stmt->bindParam(':apellidos', $apellidos);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':password_hash', $password_hash);
                        $stmt->bindParam(':fecha', $fecha);
                        $stmt->execute();
                        header("Location: index.php");
                        exit();
                    } else {
                        echo "El email ya existe";
                    }
                } else {
                    echo "Por favor, rellena todos los campos del formulario de registro";
                }
            }else{
                echo "Las contraseñas no coinciden";
            }
        }
    }
}