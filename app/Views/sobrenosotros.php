<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/sobrenosotros.css'); ?>"> 
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Sobre nosotros</title>
</head>

<body>
<?= $this->include('common/header') ?>

<div class="hero">
    <h1>CREEMOS EN LA SOSTENIBILIDAD</h1>
</div>

<div class="content">
    <section class="box">
        <h2>Sobre Nosotros</h2>
        <p>Somos Nahuel Alvarez y Benja Oviedo, estudiantes del Instituto Técnico de Río Tercero. 
           Nos apasiona la tecnología y la innovación, y juntos hemos emprendido este proyecto 
           con el objetivo de marcar una diferencia en nuestro campo.</p>
    </section>

    <section class="box">
        <h2>Nuestra Misión</h2>
        <p>Nuestra misión es desarrollar soluciones tecnológicas que mejoren la vida de las personas. 
           Nos esforzamos por crear productos y servicios que sean accesibles, 
           eficientes y que aporten un valor real a la sociedad.</p>
    </section>

    <section class="box">
        <h2>Nuestra Visión</h2>
        <p>Visualizamos un futuro donde la tecnología no solo facilita tareas, sino que también inspira y 
           empodera a las personas para alcanzar su máximo potencial. 
           Aspiramos a ser líderes en innovación, 
           siempre manteniendo nuestro compromiso con la calidad y la integridad.</p>
    </section>

    <section class="box">
        <h2>Nuestros Valores</h2>
        <p>Creemos en la importancia de la educación, el trabajo en equipo y la ética profesional. 
           Cada proyecto que emprendemos está guiado por estos valores, 
           asegurando que nuestro impacto sea positivo y duradero.</p>
    </section>
</div>


<?= $this->include('common/footer') ?>

<style>
    .hero {
        background-image: url("<?= base_url('imagenes/sobrenos.png'); ?>");
    }
</style>


</body>

</html>