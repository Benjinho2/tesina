<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/admin.css'); ?>">   
    <title>Panel Admin</title>
    
</head>
<body>
    <?= $this->include('common/header') ?>

        <div class="container-admin">
        <?php if (!empty($userAdmin['nombre_completo'])): ?>
            <p>Nombre:</strong> <?= $userAdmin['nombre_completo']; ?></p>
        <?php endif; ?>
        <?php if (!empty($userAdmin['email'])): ?>
            <p>Email:</strong> <?= $userAdmin['email']; ?></p>
        <?php endif; ?>
        <a href="<?= site_url('loggedOut'); ?>">Cerrar sesión</a>
    </div>
    
    <div class="container-hover">
        <a href="#">Nuevo Admin</a>
        <p>Esta página se ha creado para facilitar la creación de un nuevo administrador.</p>
    </div>

    <?= $this->include('common/footer') ?>


</body>
</html>
