<?php
require_once __DIR__ . '/../modelos/Curso.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $cursoModel = new Curso();
    $curso = $cursoModel->obtener($id);
    require_once __DIR__ . '/../vistas/formularioCurso.php';
    exit;
}

header('Location: ../index.php');
exit;
