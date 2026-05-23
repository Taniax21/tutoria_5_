<?php
require_once __DIR__ . '/conexion.php';

class Producto {
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function crear($nombre, $precio, $cantidad)
    {
        $stmt = $this->conn->prepare("INSERT INTO productos (nombre, precio, cantidad) VALUES (?, ?, ?)");
        $stmt->bind_param('sdi', $nombre, $precio, $cantidad);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }

    public function actualizar($id, $nombre, $precio, $cantidad)
    {
        $stmt = $this->conn->prepare("UPDATE productos SET nombre = ?, precio = ?, cantidad = ? WHERE id = ?");
        $stmt->bind_param('sdii', $nombre, $precio, $cantidad, $id);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }

    public function eliminar($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM productos WHERE id = ?");
        $stmt->bind_param('i', $id);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }

    public function listar()
    {
        $res = $this->conn->query("SELECT * FROM productos ORDER BY id DESC");
        $items = [];
        if ($res) {
            while ($row = $res->fetch_assoc()) {
                $items[] = $row;
            }
            $res->free();
        }
        return $items;
    }

    public function obtener($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row;
    }
}
