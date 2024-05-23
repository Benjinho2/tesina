<!-- app/Views/register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/estilo/register.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="autenticacion/registro" method="post">
            <?php if(!empty(session()->getFlashdata('success'))) : ?>
                  <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                  <?php endif ?>

                  <div class="form-group">
                    <label for="">Nombre completo</label>
                    <input type="text" class="form-control my-1 py-2" name="nombre_completo" placeholder="Ingrese su Nombre Completo">
                    <span class="text-danger"><?= isset($validacion) ? $validacion->getError('nombre_completo') : '' ?></span>      
                  </div>
                  
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
                    <button class="btn btn-primary btn-block" type="submit" class="form-control ">Register</button>
                  </div>
                  <div class="container-panel">
                <a href="login">Ya tengo una cuenta</a>
            </div>
        </form>
    </div>
</body>
</html>
