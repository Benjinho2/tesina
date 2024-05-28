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
                <ul>
                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="http://localhost/tesina/public/autenticacion/login">Login</a></li>
                    <li><a href="http://localhost/tesina/public/autenticacion/register">Register</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Contacta con nosotros</h4>
                <p>2 de Abril 1175, X5850<br>Río Tercero, Córdoba</p>
                <p>Número: 9 3571 51-1369</p>
                <p>Email: aquabot_info@gmail.com</p>
            </div>
            <div class="footer-section">
                <h4>Seguinos</h4>
                <div class="instagram">
                    <a href="https://www.instagram.com/nahuelalvarez._/"><img src="<?= base_url('imagenes/instagram.png'); ?>" class="social-icon">Nahuel Alvarez - Creador</a><br>
                    <a href="https://www.instagram.com/oviedo_benj4/" ><img src="<?= base_url('imagenes/instagram.png'); ?>" class="social-icon">Benja Oviedo - Creador</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
