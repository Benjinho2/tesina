<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/login.css'); ?>">   
    <title>Login</title>
</head>
<body>

<?= $this->include('common/header') ?>

<div class="container-login">
    <h2>Login</h2>
    <hr>
    <form action="<?= base_url('autenticacion/logueo'); ?>" method="post">
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="text" class="form-control" name="email" placeholder="Ingrese su correo">
            <span class="text-danger"><?= isset($validacion) ? $validacion->getError('email') : '' ?></span>
        </div>

        <div class="form-group">
            <label for="contraseña">Contraseña</label>
            <input type="password" class="form-control" name="contraseña" placeholder="Ingrese una contraseña">
            <span class="text-danger"><?= isset($validacion) ? $validacion->getError('contraseña') : '' ?></span>
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Login</button>
        </div>

        <a href="<?= base_url('autenticacion/register') ?>">No tengo una cuenta</a>
    </form>
</div>

<?= $this->include('common/footer') ?>

</body>
</html>
