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
        <h2>Admin</h2>
        <div class="info-admin">
            <div>
                <label>Nombre completo</label>
                <span><?= ($userAdmin['nombre_completo'])?></span>
            </div>
            <div>
                <label>Email</label>
                <span><?= ($userAdmin['email'])?></span>
            </div>
            <div>
                <label>Cerrar sesión</label>
                <a href="<?= site_url('cerrarSesion'); ?>"><button type="button">Cerrar sesión</button></a>
            </div>
        </div>
    </div>
    
    <div class="container-nuevoadmin">
        <a href="#">Nuevo Admin</a>
        <p>Esta página se ha creado para facilitar la creación de un nuevo administrador.</p>
    </div>

    <?= $this->include('common/footer') ?>


</body>
</html>
