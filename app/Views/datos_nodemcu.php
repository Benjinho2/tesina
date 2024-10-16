<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos NodeMCU</title>
</head>
<body>
    <h1>Datos enviados desde la NodeMCU</h1>
    
    <?php if ($ssid && $password && $humidity): ?>
        <p>SSID: <?= esc($ssid) ?></p>
        <p>Contraseña: <?= esc($password) ?></p>
        <p>Humedad: <?= esc($humidity) ?>%</p>
    <?php else: ?>
        <p>No se han recibido datos aún.</p>
    <?php endif; ?>
</body>
</html>

