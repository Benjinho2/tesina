<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/login.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Login | AquaBot</title>
</head>
<body>
    <?= $this->include('common/header') ?>
    <main>
        <div class="container-login">
            <img src="<?= base_url('imagenes/login.png'); ?>" alt="Imagen de Login">
            <h2>Login</h2>
            <form action="<?= base_url('iniciarSesion'); ?>" method="post">
                <?php if (session()->get('exito')) : ?>
                    <div class="alert alert-exito"><?= session()->get('exito'); ?></div>
                        <?php session()->remove('exito'); ?>
                        <?php session()->remove('emailValido'); ?>
                <?php endif ?>
                <?php if (session()->get('error')) : ?>
                    <div class="alert alert-danger"><?= session()->get('error'); ?></div>
                    <?php session()->remove('error'); ?>
                <?php endif ?>

                <div class="form-group">
                    <label for="">Correo electrónico</label>
                    <input type="text" class="form-control" name="email" placeholder="Ingresa su correo" required>
                </div>

                <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" class="form-control" name="contraseña" placeholder="Ingresa su contraseña" required>
                </div>

                <div class="form-group">
                    <button class="btn" type="submit">Login</button>
                </div>
                <p >¿No tienes cuenta? <a href="<?= base_url('autenticacion/register'); ?>">Crea tu usuario</a></p>            
                <p>¿Olvidaste tu contraseña? <a href="<?= base_url('autenticacion/correo'); ?>">Restablece tu contraseña</a></p>
            </form>
        </div>
    </main>
    <?= $this->include('common/footer') ?>
</body>
</html>
