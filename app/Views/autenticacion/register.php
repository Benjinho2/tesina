<!-- app/Views/register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/estilo/register.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="#" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="" placeholder="Nombre Completo">
            
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" placeholder="Correo electrónico">
            
            <label for="contraseña">Contraseña</label>
            <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña">
            
            <label for="confirmar_contraseña">Confirmar Contraseña</label>
            <input type="password" id="confirmar_contraseña" name="confirmar_contraseña" placeholder="Confirmar Contraseña">
            
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
