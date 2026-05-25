<?php
require_once __DIR__ . '/../modelos/Curso.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $cursoModel = new Curso();
    $cursoModel->eliminar($id);
}

header('Location: ../index.php');
exit;
