<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/inicio.css'); ?>">   
    <title>Login</title>
</head>
<body>

<?= $this->include('common/header') ?>

  <link rel="stylesheet" href="estilo/inicio.css">   
    <div class="hero">
      <div class="letras">
      <h1>Bienvenido a nuestro sistema de riego automático</h1>
        <br>
        <p><strong>Riega Inteligentemente, Crece Saludablemente</strong></p>
        <br>
        <p>
            Este sistema está diseñado para facilitar y optimizar el riego de tus cultivos o jardín.
            <br>
             Utilizando la más avanzada tecnología, nuestro sistema puede ajustar el riego según 
             <br>
             las necesidades específicas de cada planta y las condiciones climáticas.
        </p>
        <p>
            En las próximas secciones, podrás encontrar más información sobre cómo funciona el sistema,
            <br>
             cómo configurarlo y consejos para obtener el máximo beneficio de su uso.
        </p>
        
        <br>
        <ul>
            <li><a href="#">Cómo funciona</a></li>
         
            <li><a href="#">Configuración</a></li>
      
            <li><a href="#">Consejos y trucos</a></li>
        </ul>

        </div>

      <style>

      .hero {

      background-image: url("imagenes/inicio.jpg");

      }

      </style>

    </div>


  <?= $this->include('common/footer') ?>

</body>
</html>
