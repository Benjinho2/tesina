<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/perfil.css'); ?>">   
    <title>Perfil</title>
</head>

<body>
<?= $this->include('common/header') ?>

    <div class="perfil-container">
        <h2>Perfil</h2>
        <div class="perfil-info">
            <div>
                <label>Nombre completo</label>
                <span><?= ($userPerfil['nombre_completo'])?></span>
            </div>
            <div>
                <label>Email</label>
                <span><?= ($userPerfil['email'])?></span>
            </div>
            <div>
                <label>Cerrar sesión</label>
                <a href="<?= site_url('cerrarSesion'); ?>"><button type="button">Cerrar sesión</button></a>
            </div>
        </div>
    </div>

<?= $this->include('common/footer') ?>

</body>

</html>