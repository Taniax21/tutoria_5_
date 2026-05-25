<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Foro de Comentarios</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; }
        h2 { color: #1e3a5f; margin-bottom: 25px; }
        .card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); margin-bottom: 20px; }
        input, textarea { width: 100%; padding: 10px; margin-bottom: 15px; border: 1.5px solid #ddd; border-radius: 8px; font-size: 14px; font-family: Arial; box-sizing: border-box; }
        textarea { height: 100px; resize: vertical; }
        input:focus, textarea:focus { border-color: #2e86de; outline: none; }
        button { width: 100%; padding: 12px; background: #2e86de; color: white; border: none; border-radius: 8px; font-size: 15px; cursor: pointer; }
        button:hover { background: #1e3a5f; }
        a { display: block; text-align: center; margin-top: 15px; color: #2e86de; font-size: 13px; }
    </style>
</head>
<body>
<div class="container">
    <h2>💬 Foro de Comentarios</h2>
    <div class="card">
        <form action="../controlador/insertar.php" method="POST">
            <input type="text" name="usuario" placeholder="Tu nombre" required>
            <textarea name="mensaje" placeholder="Escribe tu comentario aquí..." required></textarea>
            <button type="submit">Publicar comentario</button>
        </form>
        <a href="listado.php">Ver todos los comentarios</a>
    </div>
</div>
</body>
</html>