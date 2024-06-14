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

        <input type="checkbox" id="menu-toggle" class="menu-button">
        <label for="menu-toggle" class="menu-button"></label>

        <nav>
            <ul>
                <li><a href="<?= base_url('sobrenosotros'); ?>">Sobre nosotros</a></li>
                <li><a href="<?= base_url('contacto'); ?>">Contacto</a></li>
                <?php if (session('userData')): ?>
                    <li><a href="<?= base_url('perfil'); ?>"><?= session('userData')['nombre_completo']; ?></a></li>
                <?php else: ?>
                <li><a href="<?= site_url('autenticacion/login'); ?>">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>


<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const navMenu = document.querySelector('nav ul');
        navMenu.classList.toggle('open');
    });
</script>

</body>
</html>
