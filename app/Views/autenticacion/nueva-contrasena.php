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
                <p>Ingresa tu código de recuperación y la nueva contraseña</p>
                <?php if (session()->get('exito')) : ?>
                    <div class="alert alert-exito"><?= session()->get('exito'); ?></div>
                    <?php session()->remove('exito'); ?>
                <?php endif ?>     
                <?php if (session()->get('error')) : ?>
                    <div class="alert alert-danger"><?= session()->get('error'); ?></div>
                    <?php session()->remove('error'); ?>
                <?php endif ?>
                
                <div class="code-container">
                    <label for="codigo">Código de verificación</label>
                    <input type="text" name="codigo" id="codigo" placeholder="Ingrese el código" required>
                </div>

                <div class="password-container">
                    <label for="nueva_contrasena">Contraseña</label>
                    <input type="password" name="nueva_contrasena" id="nueva_contrasena" placeholder="Nueva contraseña" required>
                </div>

                <div class="password-container">
                    <label for="confirmar_contrasena">Confirmar contraseña</label>
                    <input type="password" name="confirmar_contrasena" id="confirmar_contrasena" placeholder="Confirmar contraseña" required>
                </div>

                <button type="submit">Actualizar Contraseña</button>
            </form>
        </div>
    </main>
    <?= $this->include('common/footer'); ?>
</body>
</html>
