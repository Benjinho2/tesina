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
    <h1>SOMOS LO QUE NOS MUEVE</h1>
</div>

<div>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto ea obcaecati incidunt aut veniam. Cum ea, tempore voluptates architecto ratione aperiam nihil beatae nostrum est! Odit animi quod cum quibusdam!</p>
</div>
<?= $this->include('common/footer') ?>

<style>
    .hero {
        background-image: url("<?= base_url('imagenes/inicio2.png'); ?>");
    }
</style>


</body>

</html>