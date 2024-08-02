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
            <form action="<?= base_url('/nueva_contrasena/actualizar') ?>" method="post">
                <h1>Restablecer Contraseña</h1>
                <p>Ingresa tu correo electrónico y la nueva contraseña</p>
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="error"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>
                <input type="text" name="email" id="email" required placeholder="email@s-track.com">
                <div class="password-container">
                    <input type="password" name="nueva_contrasena" id="nueva_contrasena" required placeholder="Nueva Contraseña" minlength="6">
                </div>
                <div class="password-container">
                    <input type="password" name="repetir_contrasena" id="repetir_contrasena" required placeholder="Repetir Contraseña" minlength="6">
                </div>
                <button type="submit">Actualizar Contraseña</button>
            </form>
        </div>
    </main>
    <?= $this->include('common/footer'); ?>
</body>
</html>