<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/configuracion.css'); ?>">   
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Configuracion | AquaBot</title>
</head>
<body>
<?= $this->include('common/header') ?>
<main>
    <div class="configuracion">
        <h1>Configuración de Riego</h1>
        <form action="<?= base_url('guardar'); ?>" method="post" class="config-form">

            <label for="id_dispositivo">ID Dispositivo:</label>
            <input type="text" name="id_dispositivo" id="id_dispositivo" required>

            <label for="nivel_minimo_humedad">Nivel Mínimo de Humedad:</label>
            <input type="number" step="0.1" name="nivel_minimo_humedad" id="nivel_minimo_humedad" required>

            <label for="nivel_maximo_humedad">Nivel Máximo de Humedad:</label>
            <input type="number" step="0.1" name="nivel_maximo_humedad" id="nivel_maximo_humedad" required>

            <button type="submit">Agregar Configuración</button>
        </form>
        
    </div>
</main>
<?= $this->include('common/footer') ?>
</body>
</html>