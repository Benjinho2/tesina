<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resetear contraseña | AquaBot</title>
</head>
<body>
    <?= $this->include('common/header')?>

    <main>
    <div class="login-container">
        <form action="<?= base_url('correo') ?>" method="post">
            <h1>Olvide Mi Contraseña</h1>
            <p>Ingresa tu correo electrónico</p>
            <?php if(session()->get('error')): ?>
                <div class="error"><?= session()->get('error') ?></div>
                <?php session()->remove('error'); ?>
            <?php endif; ?>
            <input type="text" name="email" id="email" required placeholder="email@aquabot.com">
            <button type="submit">Enviar Correo</button>
        </form>
    </div>
    </main>

    <?= $this->include('common/footer')?>
</body>
</html>