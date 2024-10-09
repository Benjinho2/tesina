<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexión Wi-Fi</title>
</head>
<body>
    <h1>Enviar datos de Wi-Fi</h1>
    <form action="http://IP_DE_LA_Nodemcu" method="post">
        <label for="ssid">SSID (Nombre de la red):</label><br>
        <input type="text" id="ssid" name="ssid"><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="text" id="password" name="password"><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
