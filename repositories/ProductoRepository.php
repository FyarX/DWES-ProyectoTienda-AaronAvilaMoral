<?php
Namespace Repositories;

use Lib\Conexion;

use PDO;
use PDOException;

//? La clase contiene todas las operaciones relacionadas con la entidad Producto
class ProductoRepository {
    private $bbdd;
    public function __construct() {
        $bbdd = new Conexion();
    }

    //* Crear un nuevo producto
    public function crearProducto($categoria_id, $nombre, $descripcion, $precio, $stock, $oferta, $fecha, $imagen) {
            try{
            // Preparamos la consulta
            $stmt = $this->bbdd->prepare("'INSERT INTO productos (categoria_id, nombre, descripcion, precio, stock, oferta, fecha, imagen) VALUES (:categoria_id, :nombre, :descripcion, :precio, :stock, :oferta, :fecha, :imagen)'");
            
            // Vinculamos los parámetros
            $stmt->bindParam(":categoria_id", $categoria_id, PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(":precio", $precio, PDO::PARAM_STR);
            $stmt->bindParam(":stock", $stock, PDO::PARAM_INT);
            $stmt->bindParam(":oferta", $oferta, PDO::PARAM_STR);
            $stmt->bindParam(":imagen", $imagen, PDO::PARAM_STR);
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);

            // Ejectuamos la consulta
            $stmt->execute();
        }catch(PDOException $e) {
            die("ERROR: No se pudo ejecutar la consulta. " . $e->getMessage());
        }
    }


    //* Eliminar un producto por su ID
    public function eliminarProducto($id) {
        try{
            // Preparamos la consulta
            $stmt = $this->bbdd->prepare("'DELETE FROM productos WHERE id = :id'");
            
            // Vinculamos los parámetros
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            // Ejectuamos la consulta
            $stmt->execute();
        }catch(PDOException $e) {
            die("ERROR: No se pudo ejecutar la consulta. " . $e->getMessage());
        }
    }


    //* Actualizar los datos de un producto ya existente
    public function actualizarProducto($id, $categoria_id, $nombre, $descripcion, $precio, $stock, $oferta, $fecha, $imagen) {
        try{
            // Preparamos la consulta
            $stmt = $this->bbdd->prepare("'UPDATE productos SET categoria_id = :categoria_id, nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock, oferta = :oferta, fecha = :fecha, imagen = :imagen WHERE id = :id'");

            // Vinculamos los parámetros
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":categoria_id", $categoria_id, PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(":precio", $precio, PDO::PARAM_STR);
            $stmt->bindParam(":stock", $stock, PDO::PARAM_INT);
            $stmt->bindParam(":oferta", $oferta, PDO::PARAM_STR);
            $stmt->bindParam(":imagen", $imagen, PDO::PARAM_STR);
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);

            // Ejectuamos la consulta
            $stmt->execute();
        }catch(PDOException $e) {
            die("ERROR: No se pudo ejecutar la consulta. " . $e->getMessage());
        }
    }
}


?>