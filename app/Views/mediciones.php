<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Mediciones</title>
    <link rel="stylesheet" href="<?= base_url('estilo/medicion.css') ?>"> <!-- Cambia aquí el nombre del archivo -->
</head>
<body>
<?= $this->include('common/header'); ?>
<main>  
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
                    <td><?= ($medicion['id_planta']) ?></td>
                    <td><?= ($medicion['humedad']) ?></td>
                    <td><?= ($medicion['id_usuario']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?= $this->include('common/footer'); ?>

</body>
</html>
