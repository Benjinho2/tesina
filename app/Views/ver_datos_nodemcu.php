<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos NodeMCU</title>
</head>
<body>
    <h1>Datos recibidos</h1>
    <p><strong>SSID:</strong> <?= htmlspecialchars($ssid) ?></p>
    <p><strong>Contraseña:</strong> <?= htmlspecialchars($password) ?></p>
    <p><strong>Humedad:</strong> <?= htmlspecialchars($humidity) ?></p>
</body>
</html>
