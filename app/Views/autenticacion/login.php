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
        <h2>Login</h2>
        <hr>
        <form action="<?= base_url('iniciarSesion'); ?>" method="post">
            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
            <?php endif ?>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="text" class="form-control" name="email" placeholder="Ingrese su correo" required>
            </div>

            <div class="form-group">
                <img src="<?= base_url('imagenes/email.png'); ?>">
                <label for="contraseña">Contraseña</label>
                <input type="password" class="form-control" name="contraseña" placeholder="Ingrese una contraseña" required>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Login</button>
            </div>

            <a href="<?= base_url('autenticacion/register'); ?>">No tengo una cuenta</a>
        </form>
    </div>
</main>

<style>
    body {
        background-image: url("<?= base_url('imagenes/planta3.jpg'); ?>");
    }
</style>

<?= $this->include('common/footer') ?>

</body>
</html>
