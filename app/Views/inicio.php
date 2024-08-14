<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/inicio.css'); ?>">   
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Inicio | AquaBot</title>
</head>
<body>

<?= $this->include('common/header') ?>
  <main>
    <div class="hero">
      <div class="letras">
        <h1>Bienvenido a nuestro sistema de riego automático</h1>
        <p><strong>Riega Inteligentemente, Crece Saludablemente</strong></p>
        <p>
            Este sistema está diseñado para facilitar y optimizar el riego de tus cultivos.
            Utilizando la tecnología, nuestro sistema puede ajustar el riego según 
            las necesidades específicas de cada planta y las condiciones climáticas.
        </p>
        <p>
            En las próximas secciones, podrás encontrar más información sobre cómo funciona el sistema,
            cómo configurarlo y consejos para obtener el máximo beneficio de su uso.
        </p>
        <ul>
            <li><a href="<?= base_url('como-funciona'); ?>">Cómo funciona</a></li>
            <?php if (session('userData')): ?>
                <li><a href="<?= base_url('configuracion'); ?>">Configuración</a></li>
            <?php else: ?> 
                <!-- Si no existe 'userData', no mostrar el enlace -->
            <?php endif; ?>
            <li><a href="<?= base_url('consejo-truco'); ?>">Consejos y trucos</a></li>
        </ul>
      </div>
    </div>  

    <section class="features">
      <h2>Nuestras Características</h2>
      <div class="feature-list">
        <div class="feature-item">
          <h3>Configuración Personalizada</h3>
          <p>Ajusta los niveles de humedad según las necesidades específicas de tus cultivos.</p>
        </div>
        <div class="feature-item">
          <h3>Seguimiento de Humedad</h3>
          <p>Utiliza sensores para medir la humedad del suelo en base a la configuración, 
             se activa el riego en consecuencia.</p>
        </div>
        <div class="feature-item">
          <h3>Fácil Configuración</h3>
          <p>
              Ofrecemos interfaz amigable que permite una configuración rápida 
              y sencilla para usuarios de todos los niveles.
          </p>
        </div>
      </div>
   </section>
   
    <section class="contact">
      <h2>Contacto</h2>
      <p>Si tienes alguna pregunta o necesitas asistencia, no dudes en contactarnos.</p>
      <a href="<?= base_url('contacto'); ?>" class="cta-button">Contáctanos</a>
    </section>

    <section class="faq">
      <h2>Preguntas Generales</h2>

      <div class="faq-item">
        <h3>¿Cómo funciona el sistema de riego?</h3>
        <p>
            El sistema utiliza sensores para medir la humedad del suelo 
            y ajusta el riego en consecuencia. Para más información, <a href="<?= base_url('como-funciona'); ?>">haz click aquí</a>
        </p>
      </div>
    </section>

  </main>

<?= $this->include('common/footer') ?>

  <style>
    .hero {
      background-image: url("imagenes/inicio.png");
    }
  </style>

</body>
</html>
