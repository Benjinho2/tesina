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
    <main class="main-container">
    <!-- Mensajes de éxito o error -->
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

    <!-- Ícono para agregar una nueva planta -->
    <div class="add-plant" id="addPlantIcon" onclick="toggleForm()">
        <span><img src="<?= base_url('imagenes/mas.png'); ?>" alt="Agregar planta"></span>
    </div>

    <!-- Mostrar las plantas del usuario actual -->
    <?php if (!empty($plantas)): ?>
        <h2>Mis Plantas</h2>
        <div class="plantas-container">
            <?php foreach ($plantas as $planta): ?>
                <div class="planta-card">
                    <h3><?= $planta['nombre_planta']; ?></h3>
                    <p>Ubicación: <?= $planta['id_ubicacion'] == 1 ? 'Interior' : 'Exterior' ?></p>
                    
                    <a href="<?= base_url('configuracion/' . $planta['id_planta']) ?>">
                        <button>Configurar Humedad</button>
                    </a>

                    <a href="<?= base_url('visualizarDatos/' . $planta['id_planta']) ?>">
                        <button>Visualizar Datos</button>
                    </a>
                    <a href="<?= base_url('historial/' . $planta['id_planta']) ?>">
                        <button>Historial de Riego</button>
                    </a>

                    <a href="<?= base_url('eliminar-planta/' . $planta['id_planta']) ?>">
                        <button>Eliminar</button>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="no-plants">No tienes plantas registradas.</p>
    <?php endif; ?>
</main>


    <!-- Modal para agregar una nueva planta -->
    <div class="modal-overlay" id="modalOverlay" style="display: none;">
        <div class="modal">
        <span class="close-modal" id="closeModal" onclick="toggleForm()">&times;</span>
            <form action="<?= base_url('crearPlanta') ?>" method="post" id="createPlantForm">
                <h2>Registrar nueva planta</h2>
                <label for="nombre_planta">Nombre de la planta</label>
                <input type="text" id="nombre_planta" name="nombre_planta" required>
                <br>
                <label for="ubicacion">Ubicación</label>
                <select id="ubicacion" name="ubicacion" required>
                    <option value="1">Interior</option>
                    <option value="2">Exterior</option>
                </select>
                    <button type="submit">Crear Planta</button>
            </form>
        </div>
    </div>

    <?= $this->include('common/footer') ?>

    <script>
    function toggleForm() {
        const modalOverlay = document.getElementById('modalOverlay');
        modalOverlay.style.display = modalOverlay.style.display === 'none' || modalOverlay.style.display === '' ? 'flex' : 'none';
    }
    </script>
</body>

</html>
