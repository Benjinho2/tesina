<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/autenticacion.css">
    <title>Login</title>
</head>
<body>
<?php include 'common/header.php'; ?>

<div class="container">
    <h2>Login</h2>
    <hr>
    <form action="<?= base_url('autenticacion/logueo'); ?>" method="post">
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="text" class="form-control" name="email" placeholder="Ingrese un Correo">
            <span class="text-danger"><?= isset($validacion) ? $validacion->getError('email') : '' ?></span>
        </div>

        <div class="form-group">
            <label for="contraseña">Contraseña</label>
            <input type="password" class="form-control" name="contraseña" placeholder="Ingrese una Contraseña">
            <span class="text-danger"><?= isset($validacion) ? $validacion->getError('contraseña') : '' ?></span>
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Login</button>
        </div>

        <a href="<?= base_url('autenticacion/register') ?>">No tengo una cuenta</a>
    </form>
</div>

<?= $this->include('common/footer') ?>

<style>
    form {
    margin-top: 20px;
}

h2 {
    text-align: center;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

.form-group input {
    width: 100%;
    padding: 10px;
    margin-bottom: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-group input:focus {
    border-color: #007bff;
}

.btn-block {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    border: none;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
}

.btn-block:hover {
    background-color: #0056b3;
}

.alert {
    padding: 10px;
    color: #fff;
    border-radius: 4px;
    margin-bottom: 20px;
}

.alert-danger {
    background-color: #ff4f4f;
}

.alert-success {
    background-color: #4caf50;
}

.text-danger {
    color: #ff4f4f;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
</style>
</body>
</html>