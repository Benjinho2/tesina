<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Mediciones</title>
    <link rel="stylesheet" href="<?= base_url('estilo/medicion.css') ?>"> <!-- Cambia aquí el nombre del archivo -->
</head>
<body>
<h1>Historial de Mediciones</h1>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID Planta</th>
                <th>Humedad</th>
                <th>ID Usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mediciones as $medicion): ?>
            <tr>
                <td><?= esc($medicion['id_planta']) ?></td>
                <td><?= esc($medicion['humedad']) ?></td>
                <td><?= esc($medicion['id_usuario']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
