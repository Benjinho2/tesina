<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/nueva-contraseña.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Resetear contraseña | AquaBot</title>
</head>
<body>
    <?= $this->include('common/header'); ?>
    <main>
        <div class="login-container">
            <form action="<?= base_url('actualizar') ?>" method="post">
                <h1>Restablecer Contraseña</h1>
                <p>Ingresa tu correo electrónico y la nueva contraseña</p>
                <?php if (session()->get('error')) : ?>
                    <div class="alert alert-danger"><?= session()->get('error'); ?></div>
                    <?php session()->remove('error'); ?>
                <?php endif ?>
                <div class="password-container">
                    <input type="password" name="nueva_contraseña" id="nueva_contraseña" required placeholder="Nueva Contraseña" required>
                </div>
                <div class="password-container">
                    <input type="password" name="repetir_contraseña" id="repetir_contraseña" required placeholder="Repetir Contraseña" required>
                </div>
                <button type="submit">Actualizar Contraseña</button>
            </form>
        </div>
    </main>
    <?= $this->include('common/footer'); ?>
</body>
</html>