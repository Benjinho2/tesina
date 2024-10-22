<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Mediciones</title>
</head>
<body>
<h1>Historial de Mediciones</h1>
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
