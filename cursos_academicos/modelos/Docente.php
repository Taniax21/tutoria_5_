<?php
require_once __DIR__ . '/conexion.php';

class Docente {
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function listar()
    {
        $res = $this->conn->query("SELECT * FROM docentes ORDER BY nombre ASC");
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
        $stmt = $this->conn->prepare("SELECT * FROM docentes WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row;
    }
}
