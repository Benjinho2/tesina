<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/inicio.css'); ?>">   
    <link rel="shortcut icon" href="<?= base_url('imagenes/logo-chico.ico'); ?>" type="image/x-icon">
    <title>Login</title>
</head>
<body>

<?= $this->include('common/header') ?>

<div class="hero">
  <div class="letras">
    <h1>Bienvenido a nuestro sistema de riego automático</h1>
    <p><strong>Riega Inteligentemente, Crece Saludablemente</strong></p>
    <p>
        Este sistema está diseñado para facilitar y optimizar el riego de tus cultivos o jardín.
        Utilizando la más avanzada tecnología, nuestro sistema puede ajustar el riego según 
        las necesidades específicas de cada planta y las condiciones climáticas.
    </p>
    <p>
        En las próximas secciones, podrás encontrar más información sobre cómo funciona el sistema,
        cómo configurarlo y consejos para obtener el máximo beneficio de su uso.
    </p>
    <ul>
        <li><a href="#">Cómo funciona</a></li>
        <li><a href="#">Configuración</a></li>
        <li><a href="#">Consejos y trucos</a></li>
    </ul>
  </div>
</div>

<?= $this->include('common/footer') ?>

<style>
  .hero {
    background-image: url("imagenes/planta3.jpg");
  }
</style>

</body>
</html>
