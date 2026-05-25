<?php
require_once __DIR__ . '/../modelos/Curso.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $curso = $_POST['curso'] ?? '';
    $docenteId = isset($_POST['docente_id']) ? intval($_POST['docente_id']) : 0;
    $creditos = isset($_POST['creditos']) ? intval($_POST['creditos']) : 0;

    $cursoModel = new Curso();
    $cursoModel->crear($curso, $docenteId, $creditos);
}

header('Location: ../index.php');
exit;
