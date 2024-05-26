<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

  <?= $this->include('common/header') ?>

    <div class="container">
      <h2>Register</h2><hr>
      <form action="registro" method="post">
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
          <a href="http://localhost/tesina/public/autenticacion/login">Ya tengo una cuenta</a>
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
