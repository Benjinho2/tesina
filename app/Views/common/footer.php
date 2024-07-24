<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/footer.css'); ?>">   
    
    <title>Footer</title>
</head>
<body>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <img src="<?= base_url('imagenes/planta.png'); ?>" alt="Logo" class="logo">
                <p>&copy; 2024 AquaBot<br>Todos los derechos reservados</p>
            </div>
            <div class="footer-section">
                <h4>Enlaces</h4>
                <p><a href="<?= base_url('consejo-truco'); ?>">Consejos y trucos</a></p>
                <p><a href="<?= base_url('como-funciona'); ?>">Cómo funciona</a></p>
                <p><a href="<?= base_url('sobrenosotros'); ?>">Sobre nosotros</a></p>
                <p><a href="<?= base_url('contacto'); ?>">Contacto</a></p>
            </div>

            <div class="footer-section">
                <h4>Contacta con nosotros</h4>
                <p>Av. Vélez Sarsfield 241, X5850<br>Río Tercero, Córdoba</p>
                <p>Número: +54 9 3571 69-3098</p>
                <p>Email: aquabotinfo@gmail.com</p>
            </div>
            <div class="footer-section">
                <h4>Seguinos</h4>
                <div class="instagram">
                    <a href="https://www.instagram.com/nahuelalvarez._/"><img src="<?= base_url('imagenes/instagram.png'); ?>" class="social-icon">Nahuel Alvarez - Creador</a><br>
                    <a href="https://www.instagram.com/oviedo_benj4/"><img src="<?= base_url('imagenes/instagram.png'); ?>" class="social-icon">Benja Oviedo - Creador</a>
                </div>
            </div>
        </div>
    </footer>


</body>
</html>
