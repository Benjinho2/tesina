<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/contacto.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Contacto | AquaBot</title>
</head>

<body>

<?= $this->include('common/header') ?>

<main>
    <div class="formulario-container">
        <h2>Contacto</h2>
        <form action="<?= base_url('enviar'); ?>" method="post">
            <?php if (session()->get('exito')) : ?>
                <div class="alert alert-exito"><?= session()->get('exito'); ?></div>
            <?php endif ?>
            <?php if (session()->get('error')) : ?>
                    <div class="alert alert-danger"><?= session()->get('error'); ?></div>
            <?php endif ?>

            <div class="formulario-input">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="formulario-input">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="formulario-input">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje" required></textarea>
            </div>
            <div class="formulario-input">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</main>

<?= $this->include('common/footer') ?>

</body>

</html>
