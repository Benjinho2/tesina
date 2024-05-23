<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?= $this->include('common/header') ?>

    <form action="#" method="post">
        <label for="nombre">Correo electrónico</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingrese su Email">
        <label for="contraseña">Contraseña</label>
        <input type="password" id="contraseña" name="contraseña" placeholder="Ingrese su Contraseña">
        
        <input type="submit" value="Login">

        <a href="register">No tengo una cuenta</a>
    </form>

    <?= $this->include('common/footer') ?>
</body>
</html>