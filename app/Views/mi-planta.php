<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi planta</title>
    <link rel="stylesheet" href="<?= base_url('estilo/miplanta.css'); ?>"> 
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
</head>

<body>
    <?= $this->include('common/header'); ?>
    <main>
    <div class="hero">
    <div class="letras">
        <!-- Mostrar mensaje de éxito -->
        <?php if (session()->get('exito')): ?>
            <div class="alert alert-success">
                <?= session()->get('exito') ?>
                <?php session()->remove('exito'); // Limpiar el mensaje después de mostrarlo ?>
            </div>
        <?php endif; ?>

        <li><a href="<?= base_url('configuracion'); ?>">Configuracion</a></li>

        <!-- Formulario para crear una nueva planta -->
        <form action="<?= base_url('crearPlanta') ?>" method="post">
            <label for="nombre_planta">Nombre de la planta:</label>
            <input type="text" id="nombre_planta" name="nombre_planta" required>
            <br>
            <label for="ubicacio">Ubicacion:</label>
            <select id="ubicacio" name="ubicacion" required>
                <option value="1">Interior</option>
                <option value="0">Exterior</option>
            </select>

            <button type="submit">Crear Planta</button>
        </form>
        </div>
        </div>
            
        <!-- Mostrar las plantas del usuario actual -->
    <?php if (!empty($plantas)): ?>
        <h2>Mis Plantas</h2>
            <div class="plantas-container">
            <?php foreach ($plantas as $planta): ?>
                <div class="planta-card">
                    <h3><?= esc($planta['nombre_planta']) ?></h3>
                    <p>Ubicación: <?= esc($planta['lugar_planta']) ?></p>
                    <p>Tipo: <?= esc($planta['tipo_lugar']) ?></p>
                    <!-- Botón para configurar humedad -->
                    <a href="<?= base_url('configuracion')?>">
                        <button>Configurar Humedad</button>
                    </a>
                    <!-- Botón para visualizar los datos -->
                    <a href="<?= base_url('visualizar-datos/' . $planta['id_planta']) ?>">
                        <button>Visualizar Datos</button>
                    </a>
                    <a href="<?= base_url('eliminar'); ?>"><button>Eliminar</button></a>
                </div>
            <?php endforeach; ?>
        </div>

    <?php if (session()->get('error')): ?>
        <div class="alert alert-danger">
            <?= session()->get('error') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->get('exito')): ?>
        <div class="alert alert-success">
            <?= session()->get('exito') ?>
        </div>
    <?php endif; ?>


    
    <?php else: ?>
        <p>No tienes plantas registradas.</p>
    <?php endif; ?>
        
    </main>
    <?= $this->include('common/footer') ?>
</body>

</html>
