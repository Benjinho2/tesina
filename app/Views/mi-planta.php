<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi planta</title>
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
</head>

<body>
    <?= $this->include('common/header'); ?>
    <main>
        <!-- Mostrar mensaje de éxito -->
        <?php if (session()->get('exito')): ?>
            <div class="alert alert-success">
                <?= session()->get('exito') ?>
                <?php session()->remove('exito'); // Limpiar el mensaje después de mostrarlo ?>
            </div>
        <?php endif; ?>

        <!-- Formulario para crear una nueva planta -->
        <form action="<?= base_url('crearPlanta') ?>" method="post">
            <label for="nombre_planta">Nombre de la planta:</label>
            <input type="text" id="nombre_planta" name="nombre_planta" required>

            <label for="ubicacio">Ubicacion:</label>
            <select id="ubicacio" name="ubicacion" required>
                <option value="1">Interior</option>
                <option value="0">Exterior</option>
            </select>

            <button type="submit">Crear Planta</button>
        </form>

        <!-- Mostrar las plantas del usuario actual -->
        <?php if (!empty($plantas)): ?>
            <h2>Mis Plantas</h2>
            <?php foreach ($plantas as $planta): ?>
                <div>
                    <h3><?= esc($planta['nombre_planta']) ?></h3>
                    <p>Ubicación: <?= esc($planta['lugar_planta']) ?></p>
                    <p>Tipo: <?= esc($planta['tipo_lugar']) ?></p>
                    <!-- Botón para configurar humedad -->
                    <a href="<?= base_url('configurar-humedad/' . $planta['id_planta']) ?>">
                        <button>Configurar Humedad</button>
                    </a>
                    <!-- Botón para visualizar los datos -->
                    <a href="<?= base_url('visualizar-datos/' . $planta['id_planta']) ?>">
                        <button>Visualizar Datos</button>
                    </a>
                    <a href="<?= base_url('eliminar'); ?>"><button>Eliminar</button></a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No tienes plantas registradas.</p>
        <?php endif; ?>
    </main>
    <?= $this->include('common/footer') ?>
</body>

</html>
