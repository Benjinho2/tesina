<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/dispositivo.css'); ?>">   
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Detalles de la Planta | AquaBot</title>
    <head>
    
</head>
<body>

<?= $this->include('common/header') ?>
    <main>
        <div class="plant-details-container">   
            <div class="plant-details-box">
            <?php if (session()->get('exito')) : ?>
            <div class="alert alert-exito"><?= session()->get('exito'); ?></div>
            <?= session()->remove('exito'); ?>
        <?php endif ?>
            
                <h2>Detalles de la Planta</h2>

                <div>
                    <label>Nombre de la Planta:</labeL>
                    <span><?= session('InfoPlanta')['nombrePlanta'];?></span><br>
                </div>

                <div>
                    <label>Ubicacion:</label>
                    <span><?= session('InfoPlanta')['ubicacion']; ?></span>
                </div>

                <div>
                    <label>Humedad Mínima:</label>
                    <span><?= session('InfoPlanta')['nivel_minimo_humedad']; ?></span>
                </div>

                <div>
                    <label>Humedad Máxima:</label>
                    <span><?= session('InfoPlanta')['nivel_maximo_humedad']; ?></span>
                </div>

                <div class="mas">
                    <a href="<?= base_url('configuracion'); ?>"><i class="fa-solid fa-plus"></i></a>
                </div>
            </div>
        </div>

    </main>
            
<?= $this->include('common/footer') ?>

<script src="https://kit.fontawesome.com/3eedb6ac5a.js" crossorigin="anonymous"></script>

</body>
</html>