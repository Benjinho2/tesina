<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/correo.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Enviar correo | AquaBot</title>
</head>
<body>
<?= $this->include('common/header')?>

    <main>
    <div class="login-container">
        <form action="<?= base_url('correo') ?>" method="post">
            <h1>Olvide Mi Contraseña</h1>
            <p>Ingresa tu correo electrónico para recibir un código de verificación</p>       
                <?php if (session()->get('exito')) : ?>
                    <div class="alert alert-exito">
                        <?= session()->get('exito'); ?>
                    </div>
                <?php endif ?>     
                <?php if (session()->get('error')) : ?>
                    <div class="alert alert-danger"><?= session()->get('error'); ?></div>
                    <?php session()->remove('error'); ?>
                <?php endif ?>
            <input type="text" name="email" id="email" required placeholder="Ingrese su gmail registrado">
            <button type="submit">Enviar Correo</button>
        </form>
    </div>
    </main>

<?= $this->include('common/footer')?>
</body>
</html>