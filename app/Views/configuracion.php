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
            
            <label for="location-select">Seleccione una opción:</label>
            <select id="location-select" name="location">
                <option value="interior" selected>Interior</option>
                <option value="exterior">Exterior</option>
            </select>
            
            <label for="nivel_minimo_humedad">Nivel Mínimo de Humedad:</label>
            <input type="number" name="nivel_minimo_humedad" id="nivel_minimo_humedad" placeholder="700-1000" required>
            
            <label for="nivel_maximo_humedad">Nivel Máximo de Humedad:</label>
            <input type="number" name="nivel_maximo_humedad" id="nivel_maximo_humedad" placeholder="1200-1500" required>
            
            <button type="submit">Agregar Configuración</button>
        </form>
    </div>
</main>

<?= $this->include('common/footer') ?>
</body>
</html>