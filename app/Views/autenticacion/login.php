<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?= $this->include('common/header') ?>

    <form action="#" method="post">
        <label for="nombre">Correo electrónico</label><br>
        <input type="text" id="nombre" name="nombre" placeholder="Ingrese el Email"><br>
        <label for="contraseña">Contraseña</label><br>
        <input type="password" id="contraseña" name="contraseña" placeholder="Ingrese la Contraseña"><br><br>
        <input type="submit" value="Login">
    </form>

    <?= $this->include('common/footer') ?>
</body>
</html>