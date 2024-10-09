<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Datos en tiempo real</title>
</head>
<body>
<?= $this->include('common/header'); ?>
    <main>
        <h2>Visualizar Datos en Tiempo Real</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ID Lectura</th>
                    <th>ID Dispositivo</th>
                    <th>Fecha y Hora</th>
                    <th>Nivel de Humedad (%)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($lecturas)): ?>
                    <?php foreach ($lecturas as $lectura): ?>
                        <tr>
                            <td><?= esc($lectura['id_lectura']); ?></td>
                            <td><?= esc($lectura['id_dispositivo']); ?></td>
                            <td><?= esc($lectura['fecha_hora']); ?></td>
                            <td><?= esc($lectura['nivel_humedad']); ?>%</td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No hay datos disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
<?= $this->include('common/footer'); ?>
</body>
</html>
