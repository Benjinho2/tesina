<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/codigo.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Verficar código | AquaBot</title>
</head>
<body>
    <?= $this->include('common/header'); ?>
    <main>
        <div class="login-container">
        <form action="<?= base_url('verificar') ?>" method="post">
            <h1>Confirmar Código</h1>
            <p>Ingresa el código enviado a tu correo electrónico</p>
            <?php if (session()->get('error')) : ?>
                    <div class="alert alert-danger"><?= session()->get('error'); ?></div>
                    <?php session()->remove('error'); ?>
                <?php endif ?>
            <input type="text" name="codigo" id="codigo" placeholder="Ingrese el código" required></input>
            <button type="submit">Confirmar</button>
        </form>
        </div>
    </main>
    <?= $this->include('common/footer'); ?>
</body>
</html>