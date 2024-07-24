<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/header.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('estilo/fuente.css'); ?>">
    <title>Header</title>
</head>
<body>

<header>
    <div class="container">
        <a href="<?= base_url('/'); ?>" class="logo">
            <img src="<?= base_url('imagenes/planta.png'); ?>"><p>AquaBot</p></a>

        <nav class="nav" id="nav">
            <ul class="nav__links">
                <li class="nav__item"><a href="<?= base_url('sobrenosotros'); ?>" class="nav__link">Sobre nosotros</a></li>
                <li class="nav__item"><a href="<?= base_url('contacto'); ?>" class="nav__link">Contacto</a></li>
                <?php if (session('userData')): ?>
                    <li class="nav__item"><a href="<?= base_url('perfil'); ?>" class="nav__link"><?= session('userData')['nombre_completo']; ?></a></li>
                <?php else: ?>
                <li class="nav__item"><a href="<?= site_url('autenticacion/login'); ?>" class="nav__link">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

</body>
</html>
