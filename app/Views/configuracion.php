<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/configuracion.css'); ?>">   
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Configuracion</title>
</head>
<body>
<?= $this->include('common/header') ?>

    <div class="configuracion">
        <h1>Configuración de Riego</h1>
        <form action="<?= base_url('guardar'); ?>" method="post" class="config-form">

            <label for="nivel_minimo_humedad">Nivel Mínimo de Humedad:</label>
            <input type="number" id="nivel_minimo_humedad" name="nivel_minimo_humedad" required><br>

            <label for="nivel_maximo_humedad">Nivel Máximo de Humedad:</label>
            <input type="number" id="nivel_maximo_humedad" name="nivel_maximo_humedad" required><br>

            <label for="duracion_riego">Duración de Riego (minutos):</label>
            <input type="number" id="duracion_riego" name="duracion_riego" required><br>

            <label for="intervalo_riego">Intervalo de Riego (horas):</label>
            <input type="number" id="intervalo_riego" name="intervalo_riego" required><br>

            <button type="submit" class="btn-submit">Guardar Configuración</button>
        </form>
    </div>
    
<?= $this->include('common/footer') ?>
</body>
</html>