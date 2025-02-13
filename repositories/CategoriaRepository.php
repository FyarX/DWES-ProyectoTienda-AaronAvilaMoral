<?php
Namespace Repositories;

use Lib\Conexion;

use PDO;
use PDOException;

//? La clase contiene todas las operaciones relacionadas con la entidad Categoría
class PedidoRepository {
    private $bbdd;
    public function __construct() {
        $bbdd = new Conexion();
    }

    //* Crear una nueva categoría
    public function crearCategoría($nombre) {
        try{
            // Preparamos la consulta
            $stmt = $this->bbdd->prepare("'INSERT INTO categorias (nombre) VALUES (:nombre)'");
            
            // Vinculamos los parámetros
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);

            // Ejectuamos la consulta
            $stmt->execute();
        }catch(PDOException $e) {
            die("ERROR: No se pudo ejecutar la consulta. " . $e->getMessage());
        }
    }

    //* Eliminar una categoría por su ID
    public function eliminarCategoria($id){
        try{
            // Preparamos la consulta
            $stmt = $this->bbdd->prepare("'DELETE FROM categorias WHERE id = :id'");
            
            // Vinculamos los parámetros
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            // Ejectuamos la consulta
            $stmt->execute();
        }catch(PDOException $e) {
            die("ERROR: No se pudo ejecutar la consulta. " . $e->getMessage());
        }
    }

    public function actualizarCategoria($id, $nombre) {
        try{
            // Preparamos la consulta
            $stmt = $this->bbdd->prepare("'UPDATE categorias SET nombre = :nombre WHERE id = :id'");
            
            // Vinculamos los parámetros
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);

            // Ejectuamos la consulta
            $stmt->execute();
        }catch(PDOException $e) {
            die("ERROR: No se pudo ejecutar la consulta. " . $e->getMessage());
        }
    }
}
?>