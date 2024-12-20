<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Mediciones</title>
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
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
                    <th>Humedad</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mediciones as $medicion): ?>
                <tr>
                    <td><?= $medicion['humedad'] ?></td>
                    <td><?= $medicion['fecha']?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?= $this->include('common/footer'); ?>

</body>
</html>
