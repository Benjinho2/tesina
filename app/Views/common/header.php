<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/header.css'); ?>">   
    <title>Header</title> 
</head>
<body>

<header>
    <div class="container">
        <a href="http://localhost/tesina/public/" class="logo">
        <img src="<?= base_url('imagenes/planta.png'); ?>" ><p>AquaBot</p></a>
        <nav>
            <ul>
                <li><a href="#">Sobre nosotros</a></li>
                <li><a href="#">Contacto</a></li>
                
                <?php if (session()->has('userData')): ?>
                    <?php if (session()->get('Tipo') === 'Admin'): ?>
                        <li><a href="<?= site_url('admin/index'); ?>">Panel Admin</a></li>
                    <?php else: ?>
                        <li><a href="<?= site_url('perfil'); ?>">Perfil</a></li>
                    <?php endif; ?>
                <?php else: ?>
                    <li><a href="http://localhost/tesina/public/autenticacion/login">Login</a></li>
                    <li><a href="http://localhost/tesina/public/autenticacion/register">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

</body>
</html>
