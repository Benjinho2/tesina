<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/contacto.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Contacto</title>
</head>

<body>

<?= $this->include('common/header') ?>

    <div class="formulario-container">
        <h2>Formulario de Contacto</h2>
        <form action="#" method="post">
            <div class="formulario-input">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="formulario-input">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="formulario-input">
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" required></textarea>
            </div>
            <div class="formulario-input">
                <input type="submit" value="Enviar Mensaje">
            </div>
        </form>
    </div>

<?= $this->include('common/footer') ?>

</body>
</html>
