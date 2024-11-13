<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/configuracion.css'); ?>">   
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Configuración de Humedad</title>
</head>

<body>
    <?= $this->include('common/header'); ?>
    <main>
        
        <!-- Mensajes de éxito o error -->
        <?php if (session()->get('exito')): ?>
            <div class="alert alert-exito">
                <?= session()->get('exito'); ?>
                <?php session()->remove('exito'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->get('error')): ?>
            <div class="alert alert-danger">
                <?= session()->get('error'); ?>
                <?php session()->remove('error'); ?>
            </div>
        <?php endif; ?>
        <h1>Configuración de Humedad para <?= $planta['nombre_planta']; ?></h1>

        <form action="<?= base_url('guardarConfiguracion') ?>" method="post">
            <input type="hidden" name="id_planta" value="<?= $planta['id_planta']; ?>">
            
            <label for="nivel_minimo_humedad">Nivel Mínimo de Humedad (%):</label>
            <input type="number" id="nivel_minimo_humedad" name="nivel_minimo_humedad" required placeholder="Recomendamos a partir de un 30">
            <br>
            
            <label for="nivel_maximo_humedad">Nivel Máximo de Humedad (%):</label>
            <input type="number" id="nivel_maximo_humedad" name="nivel_maximo_humedad" required placeholder="Recomendamos un máximo de 70">
            <br>
            
            <button type="submit">Guardar Configuración</button>
        </form>
    </main>

    <?= $this->include('common/footer'); ?>

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            const minHumidity = parseInt(document.getElementById('nivel_minimo_humedad').value);
            const maxHumidity = parseInt(document.getElementById('nivel_maximo_humedad').value);

            // Validación: el nivel mínimo debe ser menor que el máximo
            if (minHumidity >= maxHumidity) {
                event.preventDefault(); // Evita que el formulario se envíe
                alert('El nivel mínimo de humedad debe ser menor que el nivel máximo de humedad.');
            }
        });
    </script>

</body>

</html>
