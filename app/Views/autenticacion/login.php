<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
</head>
<body>
    <?= $this->include('common/header') ?>
    
    <P>Login</P><hr>

       <form action="<?= base_url('autenticacion/logueo'); ?>" method="post">
            <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
            <?php endif ?>

            <div class="form-group">
                <label for="">Correo electrónico</label>
                <input type="text" class="form-control my-1 py-2" name="email" placeholder="Ingrese un Correo">
                <span class="text-danger"><?= isset($validacion) ? $validacion->getError('email') : '' ?></span>      
            </div>

            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" class="form-control my-1 py-2" name="contraseña" placeholder="Ingrese una Contraseña">
                <span class="text-danger"><?= isset($validacion) ? $validacion->getError('contraseña') : '' ?></span>      
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" class="form-control ">Login</button>
            </div>

            <a href="http://localhost/tesina/public/autenticacion/register">No tengo una cuenta</a>

        </form>
    
    <?= $this->include('common/footer') ?>
</body>
</html>