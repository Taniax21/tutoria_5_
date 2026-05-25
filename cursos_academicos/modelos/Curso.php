<?php
require_once __DIR__ . '/conexion.php';

class Curso {
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function crear($curso, $docenteId, $creditos)
    {
        $stmt = $this->conn->prepare("INSERT INTO cursos (curso, docente_id, creditos) VALUES (?, ?, ?)");
        $stmt->bind_param('sii', $curso, $docenteId, $creditos);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }

    public function actualizar($id, $curso, $docenteId, $creditos)
    {
        $stmt = $this->conn->prepare("UPDATE cursos SET curso = ?, docente_id = ?, creditos = ? WHERE id = ?");
        $stmt->bind_param('siii', $curso, $docenteId, $creditos, $id);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }

    public function eliminar($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM cursos WHERE id = ?");
        $stmt->bind_param('i', $id);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }

    public function listar()
    {
        $query = "SELECT c.id, c.curso, c.creditos, d.nombre AS docente FROM cursos c " .
                 "INNER JOIN docentes d ON c.docente_id = d.id " .
                 "ORDER BY c.id DESC";
        $res = $this->conn->query($query);
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
        $stmt = $this->conn->prepare("SELECT * FROM cursos WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row;
    }
}
