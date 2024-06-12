<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/register.css'); ?>">   
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Register</title>
</head>
<body>

<?= $this->include('common/header') ?>

<main>
    <div class="container-register">
        <img src="<?= base_url('imagenes/login.png'); ?>">
        <h2>Register</h2>
        <form action="<?= base_url('registrarse'); ?>" method="post">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif ?>
            <?php if (session()->getFlashdata('fail')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
            <?php endif ?>

            <div class="form-group">
                <input type="text" class="form-control" name="nombre_completo" placeholder="Nombre completo" required>
            </div>

            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="contraseña" placeholder="Contraseña" required>
            </div>

            <div class="form-group">
                <button class="btn" type="submit">Register</button>
            </div>

            <a href="<?= base_url('autenticacion/login'); ?>">Ya tengo una cuenta</a>
        </form>
    </div>
</main>

<?= $this->include('common/footer') ?>

</body>
</html>
