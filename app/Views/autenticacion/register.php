<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/register.css'); ?>">
    <title>Register</title>
</head>
<body>

<?= $this->include('common/header') ?>

<body>

<div class="container-register">
    <h2>Register</h2>
    <hr>
    <form action="registro" method="post">
        <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif ?>
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>

        <div class="form-group">
            <label for="nombre_completo">Nombre completo</label>
            <input type="text" class="form-control my-1 py-2" name="nombre_completo" placeholder="Ingrese su nombre completo" required>
        </div>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" class="form-control my-1 py-2" name="email" placeholder="Ingrese un correo ejemplo@gmail.com" required>
        </div>

        <div class="form-group">
            <label for="contraseña">Contraseña</label>
            <input type="password" class="form-control my-1 py-2" name="contraseña" placeholder="Ingrese una contraseña" required>
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit" class="form-control">Register</button>
        </div>
        <a href="<?= base_url('autenticacion/login') ?>">Ya tengo una cuenta</a>
    </form>
</div>

<style>
      body {
        background-image: url("<?php echo base_url('imagenes/inicio.jpg'); ?>");
      }
      </style>
</body>

<?= $this->include('common/footer') ?>

</body>
</html>
