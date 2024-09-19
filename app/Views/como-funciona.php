<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/como-funciona.css'); ?>">   
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Cómo funciona | AquaBot</title>
</head>
<body>
<?= $this->include('common/header') ?>

<main>
    <h1>Cómo funciona</h1>

    <div class="use-case">
        <h2>1. Registro de Datos de Humedad</h2>
        <p> El sistema recoge datos de humedad del suelo a través de sensores ubicados en tus cultivos. 
            Estos sensores están diseñados para medir la humedad del suelo en tiempo real 
            y proporcionar información precisa sobre las condiciones del terreno.</p>
        <ol>
            <li>Los sensores miden la humedad del suelo cada cierto intervalo de tiempo.</li>
            <li>Los datos se almacenan en el sistema, 
                el usuario puede ingresar los niveles óptimos de humedad mínimo
                y máximo que desean mantener para su cultivo.</li>
            <li>Estos datos ingresados por el usuario se comparan con los datos de los sensores.</li>
        </ol>
    </div>

    <div class="use-case">
        <h2>2. Comparación de Datos</h2>
        <p>Una vez que los datos de humedad se han registrado, 
            el sistema los analiza y compara los niveles de los sensores 
            con la configuración optima que realiza el usuario.</p>
        <ol>
            <li>El sistema evalúa y compara los datos obtenido por los sensores con los niveles óptimos establecidos por el usuario.</li>
            <li>Si la humedad del suelo se encuentra fuera del rango óptimo predefinido por el usuario, por debajo del mínimo, 
                el sistema activa el riego automáticamente para efectuar la humedad.</li>
        </ol>
    </div>

    <div class="use-case">
        <h2>3. Activación del Riego</h2>
        <p>Basado en los datos analizados y la comparación con los niveles óptimos, 
           el sistema activara el riego para adaptar la humedad del suelo.</p>
        <ol>
            <li>Si la humedad del suelo está por debajo del nivel mínimo configurado, el sistema activa el riego. 
                Una vez que se alcanza por debajo del nivel máximo de humedad, el riego se detiene. </li>
            <li>El usuario recibe una notificación sobre la activación del riego a través de su correo al cual se ha registrado.</li>
            <li>Esta funcionalidad asegura un riego eficiente y preciso, 
                adaptado a las necesidades específicas del suelo y las plantas.</li>
        </ol>
    </div>

    <div class="use-case">
        <h2>4. Proceso de Riego</h2>
        <p>Una vez que el sistema activa el riego, 
           controla y distribuye el agua de manera eficiente y uniforme, 
           asegurando que las condiciones óptimas de humedad se mantengan.
        </p>
        <ol>
            <li>
                El sistema controla y ajusta el riego para una distribución precisa del agua.
            </li>
            <li>
                El sistema continúa evaluando los niveles de humedad para evitar el riego excesivo 
                y garantizar la absorción adecuada de agua por el suelo.
            </li>
            <li>
                Una vez que la humedad sea la adectuada, el sistema desactivara el riego.
            </li>
        </ol>
    </div>
</main>

<?= $this->include('common/footer') ?>

</body>
</html>