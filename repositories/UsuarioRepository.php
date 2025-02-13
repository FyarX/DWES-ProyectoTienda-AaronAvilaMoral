<?php
Namespace Repositories;

use Lib\Conexion;

use PDO;
use PDOException;

//? La clase contiene todas las operaciones relacionadas con la entidad Usuario
class UsuarioRepository {
    private $bbdd;
    public function __construct() {
        $bbdd = new Conexion();
    }

    //* Crear un nuevo usuario con todos sus datos
    public function crearUsuario($nombre, $apellidos, $email, $password, $rol) {
        try{
            // Preparamos la consulta
            $stmt = $this->bbdd->prepare("'INSERT INTO usuarios (nombre, apellidos, email, password, rol) VALUES (:nombre, :apellidos, :email, :password, :rol)'");
            
            // Vinculamos los parámetros
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            $stmt->bindParam(":rol", $rol, PDO::PARAM_STR);

            // Ejectuamos la consulta
            $stmt->execute();
        }catch(PDOException $e) {
            die("ERROR: No se pudo ejecutar la consulta. " . $e->getMessage());
        }
    }
    

    //* Eliminar un usuario
    public function eliminarUsuario($id) {
        try{
            // Preparamos la consulta
            $stmt = $this->bbdd->prepare("'DELETE FROM usuarios WHERE id = :id'");
            
            // Vinculamos los parámetros
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            // Ejectuamos la consulta
            $stmt->execute();
        }catch(PDOException $e) {
            die("ERROR: No se pudo ejecutar la consulta. " . $e->getMessage());
        }
    }


    //* Actualizar los datos de un usuario ya existente
    public function actualizarUsuario($id, $nombre, $apellidos, $email, $password, $rol) {
        try{
            // Preparamos la consulta
            $stmt = $this->bbdd->prepare("'UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, email = :email, password = :password, rol = :rol WHERE id = :id'");
            
            // Vinculamos los parámetros
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            $stmt->bindParam(":rol", $rol, PDO::PARAM_STR);

            // Ejectuamos la consulta
            $stmt->execute();
        }catch(PDOException $e) {
            die("ERROR: No se pudo ejecutar la consulta. " . $e->getMessage());
        }
    }
}

?>