<?php
require_once "../modelo/conexion.php";

$sql = "SELECT id, usuario, mensaje, fecha FROM comentarios ORDER BY fecha DESC";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comentarios</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; }
        h2 { color: #1e3a5f; margin-bottom: 25px; }
        .comentario { background: white; border-radius: 12px; padding: 20px; margin-bottom: 15px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); }
        .cabecera { display: flex; align-items: center; gap: 12px; margin-bottom: 10px; }
        .avatar { width: 45px; height: 45px; border-radius: 50%; background: linear-gradient(135deg, #2e86de, #1e3a5f); color: white; font-size: 18px; font-weight: bold; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .info h3 { color: #1e3a5f; font-size: 15px; }
        .info span { color: #aaa; font-size: 12px; }
        .mensaje { color: #444; font-size: 14px; line-height: 1.5; margin-bottom: 12px; }
        .btn-eliminar { background: #e74c3c; color: white; border: none; padding: 6px 16px; border-radius: 20px; cursor: pointer; font-size: 13px; }
        .btn-eliminar:hover { background: #c0392b; }
        .btn-nuevo { display: inline-block; margin-top: 10px; background: #2e86de; color: white; padding: 12px 25px; border-radius: 25px; text-decoration: none; font-size: 15px; }
        .btn-nuevo:hover { background: #1e3a5f; }
        .sin-comentarios { text-align: center; color: #aaa; padding: 40px; }
    </style>
</head>
<body>
<div class="container">
    <h2>💬 Comentarios</h2>
    <?php if ($resultado->num_rows == 0): ?>
        <p class="sin-comentarios">No hay comentarios aún. ¡Sé el primero!</p>
    <?php else: ?>
        <?php while($fila = $resultado->fetch_assoc()): ?>
        <div class="comentario">
            <div class="cabecera">
                <div class="avatar"><?= strtoupper(substr($fila['usuario'], 0, 1)) ?></div>
                <div class="info">
                    <h3><?= htmlspecialchars($fila['usuario']) ?></h3>
                    <span><?= $fila['fecha'] ?></span>
                </div>
            </div>
            <p class="mensaje"><?= htmlspecialchars($fila['mensaje']) ?></p>
            <form action="../controlador/eliminar.php" method="POST">
                <input type="hidden" name="id" value="<?= $fila['id'] ?>">
                <button class="btn-eliminar" type="submit">Eliminar</button>
            </form>
        </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <a class="btn-nuevo" href="formulario.php">✏️ Nuevo comentario</a>
</div>
</body>
</html>