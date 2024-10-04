<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Humedad</title>
</head>
<body>
    <?= $this->include('common/header'); ?>
    <main>
        <h1>Configuración de Humedad para <?= $planta['nombre_planta']; ?></h1>
        
        <?php if (session()->get('exito')): ?>
            <div class="alert alert-success">
                <?= session()->get('exito'); ?>
                <?php session()->remove('exito'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->get('error')): ?>
            <div class="alert alert-danger">
                <?= session()->get('error'); ?>
                <?php session()->remove('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('guardarConfiguracion') ?>" method="post">
            <input type="hidden" name="id_planta" value="<?= $planta['id_planta']; ?>">
            <label for="nivel_minimo_humedad">Nivel Mínimo de Humedad:</label>
            <input type="number" id="nivel_minimo_humedad" name="nivel_minimo_humedad" required>
            <br>
            <label for="nivel_maximo_humedad">Nivel Máximo de Humedad:</label>
            <input type="number" id="nivel_maximo_humedad" name="nivel_maximo_humedad" required>
            <br>
            <button type="submit">Guardar Configuración</button>
        </form>
    </main>
    <?= $this->include('common/footer'); ?>
</body>
</html>
