<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resetear contraseña | AquaBot</title>
</head>
<body>
    <?= $this->include('common/header'); ?>
    <main>
        <div class="login-container">
        <form action="<?= base_url('verificar') ?>" method="post">
            <h1>Confirmar Código</h1>
            <p>Ingresa el código enviado a tu correo electrónico</p>
            <?php if(session()->get('error')): ?>
                <div class="error"><?= session()->get('error') ?></div>
            <?php endif; ?>
            <input type="text" name="codigo" id="codigo" required placeholder="Código">
            <button type="submit">Confirmar</button>
        </form>
        </div>
    </main>
    <?= $this->include('common/footer'); ?>
</body>
</html>