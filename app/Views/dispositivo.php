<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Planta</title>

    
    <style>
        /* Estilos para centrar el cuadro en la página */
        .plant-details-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Asegura que ocupe toda la altura de la ventana */
            background-color: #f0f0f0; /* Color de fondo para resaltar el cuadro */
        }

        .plant-details-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            text-align: center;
        }

        .plant-details-box h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .plant-details-box p {
            margin: 10px 0;
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>
<?php if (isset($success)): ?>
            <div class="alert alert-success">
                <?= $success ?>
            </div>
        <?php endif; ?>
<div class="plant-details-container">
    <div class="plant-details-box">
      

        <h2>Detalles de la Planta</h2>
        <p><strong>Nombre de la Planta:</strong> <?= isset($nombre_planta) ? $nombre_planta : 'No disponible'; ?></p>
        <p><strong>Ubicación:</strong> <?= isset($ubicacion) ? ucfirst($ubicacion) : 'No disponible'; ?></p>
        <p><strong>Humedad Mínima:</strong> <?= isset($nivel_minimo_humedad) ? $nivel_minimo_humedad : 'No disponible'; ?></p>
        <p><strong>Humedad Máxima:</strong> <?= isset($nivel_maximo_humedad) ? $nivel_maximo_humedad : 'No disponible'; ?></p>
    </div>
</div>

</body>
</html>