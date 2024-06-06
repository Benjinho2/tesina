<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/login.css'); ?>">   
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Login</title>
</head>
<body>
    <?= $this->include('common/header') ?>
    <main>
        <div class="container-login">
            <img src="<?= base_url('imagenes/login.png'); ?>" alt="Imagen de Login">
            <h2>Login</h2>
            <form action="<?= base_url('iniciarSesion'); ?>" method="post">
                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                <div class="form-group">
                    <div class="icon-wrapper">
                        <img src="<?= base_url('imagenes/email.png'); ?>" alt="Email Icon">
                    </div>
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="form-group">
                    <div class="icon-wrapper">
                        <img src="<?= base_url('imagenes/contraseña.png'); ?>" alt="Password Icon">
                    </div>
                    <input type="password" class="form-control" name="contraseña" placeholder="Contraseña">
                </div>

                <div class="form-group">
                    <button class="btn" type="submit">Login</button>
                </div>

                <a href="<?= base_url('autenticacion/register'); ?>">No tengo una cuenta</a>
            </form>
        </div>
    </main>
    <?= $this->include('common/footer') ?>
</body>
</html>
