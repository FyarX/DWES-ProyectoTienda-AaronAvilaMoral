<?php
Namespace Repositories;

use Lib\Conexion;

use PDO;
use PDOException;

//? La clase contiene todas las operaciones relacionadas con la entidad Pedido
class PedidoRepository {
    private $bbdd;
    public function __construct() {
        $bbdd = new Conexion();
    }

    //* Crear un nuevo pedido con el ID del usuario y todos los datos del pedido
    public function crearPedido($usuario_id, $provincia, $localidad, $direccion, $coste, $estado, $fecha, $hora) {
            try{
            // Preparamos la consulta
            $stmt = $this->bbdd->prepare("'INSERT INTO pedidos (usuario_id, provincia, localidad, direccion, coste, estado, fecha, hora) VALUES (:usuario_id, :provincia, :localidad, :direccion, :coste, :estado, :fecha, :hora)'");
            
            // Vinculamos los parámetros
            $stmt->bindParam(":usuario_id", $usuario_id, PDO::PARAM_INT);
            $stmt->bindParam(":provincia", $provincia, PDO::PARAM_STR);
            $stmt->bindParam(":localidad", $localidad, PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindParam(":coste", $coste, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $stmt->bindParam(":hora", $hora, PDO::PARAM_STR);

            // Ejectuamos la consulta
            $stmt->execute();
        }catch(PDOException $e) {
            die("ERROR: No se pudo ejecutar la consulta. " . $e->getMessage());
        }
    }


    //* Eliminar un pedido por su ID
    public function eliminarPedido($id) {
        try{
            // Preparamos la consulta
            $stmt = $this->bbdd->prepare("'DELETE FROM pedidos WHERE id = :id'");
            
            // Vinculamos los parámetros
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            // Ejectuamos la consulta
            $stmt->execute();
        }catch(PDOException $e) {
            die("ERROR: No se pudo ejecutar la consulta. " . $e->getMessage());
        }
    }


    //* Actualizar los datos de un pedido ya existente
    public function actualizarPedido($id, $usuario_id, $provincia, $localidad, $direccion, $coste, $estado, $fecha, $hora) {
        try{
            // Preparamos la consulta
            $stmt = $this->bbdd->prepare("'UPDATE pedidos SET usuario_id = :usuario_id, provincia = :provincia, localidad = :localidad, direccion = :direccion, coste = :coste, estado = :estado, fecha = :fecha, hora = :hora WHERE id = :id'");

            // Vinculamos los parámetros
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":usuario_id", $usuario_id, PDO::PARAM_INT);
            $stmt->bindParam(":provincia", $provincia, PDO::PARAM_STR);
            $stmt->bindParam(":localidad", $localidad, PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindParam(":coste", $coste, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $stmt->bindParam(":hora", $hora, PDO::PARAM_STR);

            // Ejectuamos la consulta
            $stmt->execute();
        }catch(PDOException $e) {
            die("ERROR: No se pudo ejecutar la consulta. " . $e->getMessage());
        }
    }
}


?>