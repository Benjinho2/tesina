<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico') ?>">
    <link rel="stylesheet" href="<?= base_url('estilo/historial.css') ?>">
    <title>Historial de Riego</title>
</head>
<body>
    <?= $this->include('common/header'); ?>
    <main>
    <h2>Historial de Riegos</h2>

<table>
    <thead>
        <tr>
            <th>Fecha y Hora</th>
            <th>Duración del Riego</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($riegos)) : ?>
            <?php foreach ($riegos as $riego) : ?>
                <tr>
                    <td><?=$riego['fecha_hora']; ?></td>
                    <td><?=$riego['duracion_riego']; ?> min</td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="2">No hay registros de riego.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

    </main>
    <?= $this->include('common/footer'); ?>
</body>
</html>