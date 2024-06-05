<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/perfil.css'); ?>">   
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Perfil</title>
</head>

<body>
    
<?= $this->include('common/header') ?>

    <div class="perfil-container">
        <img src="<?= base_url('imagenes/perfil.png'); ?>">
        <h2>Perfil</h2>
        <div class="perfil-info">
            <div>
                <label>Nombre completo</label>
                <span><?= session('userData')['nombre_completo']; ?></span>
            </div>
            <div>
                <label>Email</label>
                <span><?= session('userData')['email']; ?></span>
            </div>
            <div>
                <label>Cerrar sesión</label>
                <a href="<?= base_url('cerrarSesion'); ?>"><button type="button">Cerrar sesión</button></a>        
            </div>
        </div>
    </div>
    
<?= $this->include('common/footer') ?>

</body>

</html>



