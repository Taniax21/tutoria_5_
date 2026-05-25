<?php
require_once __DIR__ . '/../modelos/Curso.php';

$cursoModel = new Curso();
$cursos = $cursoModel->listar();
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Lista de Cursos Académicos</title>
</head>
<body>
  <h1>Cursos Académicos</h1>
  <p><a href="vistas/formularioCurso.php">Registrar nuevo curso</a></p>
  <table border="1" cellpadding="6" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Curso</th>
        <th>Docente</th>
        <th>Créditos</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($cursos as $c): ?>
        <tr>
          <td><?php echo $c['id']; ?></td>
          <td><?php echo htmlspecialchars($c['curso']); ?></td>
          <td><?php echo htmlspecialchars($c['docente']); ?></td>
          <td><?php echo $c['creditos']; ?></td>
          <td>
            <a href="controladores/editarcurso.php?id=<?php echo $c['id']; ?>">Editar</a>
            |
            <a href="controladores/eliminarcurso.php?id=<?php echo $c['id']; ?>" onclick="return confirm('Eliminar este curso?');">Eliminar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
