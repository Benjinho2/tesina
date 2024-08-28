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
            <label for="nombre_planta">Nombre de la planta</label>
            <input type="text" name="nombre_planta" id="nombre_planta" required>

            <label for="location-select">Su Planta es de:</label>
            <select id="location-select" name="location" onchange="adjustHumidityValues()">
                <option value="interior">Interior</option>
                <option value="exterior">Exterior</option>
            </select>

            <label for="min-humidity">Humedad mínima</label>
            <input type="number" name="nivel_minimo_humedad" id="min-humidity" readonly>

            <label for="max-humidity">Humedad máxima</label>
            <input type="number" name="nivel_maximo_humedad" id="max-humidity" readonly>

            <button type="submit">Guardar</button>
            </form>
        </div>
    </main>

    <?= $this->include('common/footer') ?>

    <script>
    function adjustHumidityValues() {
        const locationSelect = document.getElementById('location-select');
        const minHumidityInput = document.getElementById('min-humidity');
        const maxHumidityInput = document.getElementById('max-humidity');
        
        if (locationSelect.value === 'interior') {
            minHumidityInput.value = 700;
            maxHumidityInput.value = 1000;
        } else if (locationSelect.value === 'exterior') {
            minHumidityInput.value = 500;
            maxHumidityInput.value = 800;
        }
    }

    // Inicializa los valores al cargar la página
    adjustHumidityValues();
    </script>
</body>
</html>